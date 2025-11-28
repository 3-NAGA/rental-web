<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\UuidHelper;
use App\Models\Setting;
use App\Models\Car;
use App\Models\CarTable;
use App\Models\Booking;
use App\Models\AffiliateProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BookingRequest;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Picqer\Barcode\BarcodeGeneratorPNG;


class CarController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::first();
        $car = Car::where('status',1);

        $item = UuidHelper::encodeIdToUuid($car);
        // return $item;
        $cars = UuidHelper::decodeUuidToId($item);
        
        if($request->category_id && $request->penumpang){
            $cars = $cars->Where('type_id',$request->category_id)->Where('penumpang','>=',$request->penumpang);
        }
        
        $cars = $cars->get();
        // return $cars;
        return view('frontend.car.index', compact('cars','setting'));
    }

    public function show($car)
    {
        // return $car;
        $id = UuidHelper::decodeUuidToId($car);
        // return $id;
        $cars = CarTable::where('id',$id)->first();
        // return $cars;
        $setting = Setting::first();
        // $item = UuidHelper::encodeIdToUuid($car->id);
        // return $item;
       
        
        // return $id;

        // $data = Data::findOrFail($id);
        // return view('data.show', compact('data'));
        return view('frontend.car.show', compact('cars','setting'));
    }

    public function store(BookingRequest $request)
    {
        // return $request->all();
        Booking::create($request->validated());

        $booking = Booking::create($request->all());

        $phone = '6282111371287';

        // Pesan default
        $message = "Hi Team PCR saya ingin Booking mobil apakah tersedia ?";

        // Jika ada parameter text dari URL, override
        if ($request->has('text') && !empty($request->text)) {
            $message = $request->text;
        }

        // Encode pesan agar aman di URL
        $encodedMessage = urlencode($message);

        // Buat link WhatsApp API
        $whatsappUrl = "https://api.whatsapp.com/send?phone={$phone}&text={$encodedMessage}";

        // Redirect ke WhatsApp
        return redirect()->away($whatsappUrl);

        // return redirect()->back()->with([
        //     'message' => 'kami akan menghubungi anda secepatnya !',
        //     'alert-type' => 'success'
        // ]);
    }


    public function leaderboard()
    {
        $setting = Setting::first();
        $leaders = AffiliateProgress::with('user')
            ->orderByDesc('total_referral')
            ->take(10)
            ->get();

        return view('leaderboard.index', compact('leaders','setting'));
    }

    public function calculateCashback($referralCount)
    {
        return match(true) {
            $referralCount >= 10 => 150000,
            $referralCount >= 5 => 50000,
            default => 0,
        };
    }

    public function invoice()
{
    // $invoice = Invoice::findOrFail($id);
    // echo phpinfo();
    // return "TEST";
    // Payment URL dari Midtrans (Snap redirect link)
    // $paymentUrl = 'https://dev.cekpremistage.com/sit/indotekno/checkout/8bf87d22-8efb-4193-8a89-6f8e49bf251c/6';

    // // QRCode pakai GD, bukan Imagick
    // $qrCode = base64_encode(
    //     QrCode::format('png')
    //         ->size(250)
    //         ->errorCorrection('H')
    //         ->generate($paymentUrl)
    // );

    // // Barcode tetap aman pakai PNG (GD)
    // $generator = new BarcodeGeneratorPNG();
    // $barcode = base64_encode(
    //     $generator->getBarcode('CP20101231', $generator::TYPE_CODE_128)
    // );

    // return $barcode;


    // return view('invoice', compact('invoice', 'qrCode', 'barcode', 'paymentUrl'));
    // return view('invoice');
    return view('welcome');

}


}