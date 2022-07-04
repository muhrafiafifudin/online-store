<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function index()
    {
        $users = User::get();
        $address = RajaOngkir::kota()->dariProvinsi(Auth::user()->provinces_id)->find(Auth::user()->cities_id);

        $oldCart = Cart::where('users_id', Auth::id())->get();
        foreach ($oldCart as $item) {
            if (!Product::where('id', $item->products_id)->where('qty', '>=', $item->products_qty)->exists()) {
                $removeItem = Cart::where('users_id', Auth::id())->where('products_id', $item->products_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('users_id', Auth::id())->get();

        return view('pages.checkout', compact('cartItems', 'users', 'address'));
    }

    public function getProvince()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . env('RAJAONGKIR_API_KEY')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $arrayResponse = json_decode($response, true);
            $provinces = $arrayResponse['rajaongkir']['results'];

            echo "<option>Choose Your Province</option>";

            foreach ($provinces as $province) {
                echo "<option value='" . $province['province_id'] . "' >" . $province['province'] . "</option>";
            }
        }
    }

    public function getCity($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . env('RAJAONGKIR_API_KEY')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $arrayResponse = json_decode($response, true);
            $cities = $arrayResponse['rajaongkir']['results'];

            echo "<option>Choose Your City</option>";

            foreach ($cities as $city) {
                echo "<option value='" . $city['city_id'] . "' >" . $city['city_name'] . "</option>";
            }
        }
    }

    public function getCourier(Request $request)
    {
        if ($request) {
            echo '<option value="jne" name="JNE">JNE</option>';
            echo '<option value="tiki" name="TIKI">TIKI</option>';
            echo '<option value="pos" name="POS Indonesia">POS Indonesia</option>';
        }
    }

    public function getPackage(Request $request)
    {
        $stores = Store::all();

        foreach ($stores as $store) {
            $origin = $store->regencies_id;
        }

        $getLocation = array(
            'origin'        => 54,     // ID kota/kabupaten asal
            'destination'   => $request->city_id,      // ID kota/kabupaten tujuan
            'weight'        => $request->weight,    // berat barang dalam gram
            'courier'       => $request->courier_id,    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $getLocation['origin'] . "&destination=" . $getLocation['destination'] . "&weight=" . $getLocation['weight'] . "&courier=" . $getLocation['courier'] . "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . env('RAJAONGKIR_API_KEY')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $arrayResponse = json_decode($response, true);
            $packages = $arrayResponse['rajaongkir']['results'][0]['costs'];

            foreach ($packages as $package) {
                echo "<option value='" . $package['service'] . "' ongkir='" . $package['cost'][0]['value'] . "' estimasi='" . $package['cost'][0]['etd'] . "'>";
                echo $package['service'] . " | IDR " . $package['cost'][0]['value'];
                echo "</option>";
            }
        }
    }

    public function getEstimate(Request $request)
    {
        echo $request;
    }

    public function placeorder(Request $request)
    {
        $transaction = new Transaction();
        $transaction->users_id = Auth::id();
        $transaction->name = $request->input('name');
        $transaction->email = $request->input('email');
        $transaction->provinces_id = $request->input('province');
        $transaction->cities_id = $request->input('city');
        $transaction->address = $request->input('address');
        $transaction->postcode = $request->input('postcode');
        $transaction->phone_number = $request->input('phone_number');
        $transaction->courier = $request->input('courier');
        $transaction->weight = $request->input('weight');
        $transaction->estimate = $request->input('estimate');
        $transaction->note = $request->input('note');

        // To Calculate the Gross Amount
        $gross_amount = 0;
        $cartItems_total = Cart::where('users_id', Auth::id())->get();

        foreach ($cartItems_total as $data) {
            $gross_amount += $data->products->price * $data->products_qty;
        }

        $transaction->gross_amount = $gross_amount;
        $transaction->order_number = 'order-' . rand();
        $transaction->save();

        $cartItems = Cart::where('users_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $item->products_id,
                'qty' => $item->products_qty
            ]);

            $product = Product::where('id', $item->products_id)->first();
            $product->qty = $product->qty - $item->products_qty;
            $product->update();
        }

        if (Auth::user()->street_address == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->provinces_id = $request->input('province');
            $user->cities_id = $request->input('city');
            $user->address = $request->input('address');
            $user->postcode = $request->input('postcode');
            $user->phone_number = $request->input('phone_number');
            $user->update();
        }

        $cartItems = Cart::where('users_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/account/transaction')->with('success', 'Order Placed Successfully');
    }
}
