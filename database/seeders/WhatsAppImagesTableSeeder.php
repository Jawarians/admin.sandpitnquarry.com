<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhatsAppImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('whats_app_images')->delete();
        
        DB::table('whats_app_images')->insert(array (
            0 => 
            array (
                'id' => '1506757333211972',
                'url' => '/storage/1506757333211972.jpeg',
                'caption' => '*CAWANGAN BARU BOBROCK 🤩*

Hi pelanggan setia BOBROCK 👋🏻, kini BOBROCK telah membuka cawangan baru di Wangsa Walk Mall, KL⁉️✨ 

Kami juga ada sediakan baucar khas untuk bos yang datang walk-in di cawangan Wangsa Walk Mall 🤩

Jom tebus baucar *RM25 (KOD: WWM25)* dengan berbelanja *minima RM50* di Wangsa Walk Mall sebelum *31 May 2024.*

Apa lagi bos! Jom ramai-ramai serbu BOBROCK di Tingkat 1, Wangsa Walk Mall sekarang! 

📍Waze alamat:
*BOBROCK*
Lot 1-52, Wangsa Walk Mall,
Wangsa Avenue, Jln Wangsa Perdana 1,
53300 Kuala Lumpur,
Wilayah Persekutuan.',
                'mime_type' => 'image/jpeg',
                'created_at' => '2024-05-12 12:23:37',
                'updated_at' => '2024-05-12 12:23:37',
            ),
            1 => 
            array (
                'id' => '425727946914630',
                'url' => '/storage/425727946914630.jpeg',
                'caption' => NULL,
                'mime_type' => 'image/jpeg',
                'created_at' => '2024-05-16 09:21:46',
                'updated_at' => '2024-05-16 09:21:46',
            ),
            2 => 
            array (
                'id' => '1163751091335892',
                'url' => '/storage/1163751091335892.jpeg',
                'caption' => '*MID-YEAR SALE* 💥

Jom membeli belah dengan kami dan nikmati diskaun HEBAT sehingga *potongan 70%* sekarang!

Promosi ini berlangsung sehingga *30 Jun 2024*

Jom singgah kedai kami:-
📍BOBROCK @ Shah Alam
Lot F15, Aras 1
Plaza Shah Alam, Shah Alam

📍BOBROCK @ Wangsa Maju
Lot 1-52, Aras 1
Wangsa Walk Mall, Kuala Lumpur

atau layari:
https://www.bobrock.com.my/collections/mid-year-sale',
                'mime_type' => 'image/jpeg',
                'created_at' => '2024-05-27 12:28:21',
                'updated_at' => '2024-05-27 12:28:21',
            ),
            3 => 
            array (
                'id' => '473172991768470',
                'url' => '/storage/473172991768470.jpeg',
                'caption' => '*KURTA ON SALE‼️*

Great news! Our kurta collection is now on sale with discounts of up to 50% off! 😱

Don\'t forget to redeem your *RM15 voucher (_CODE: KUR15_)* for purchases over RM199 on any kurta.

The voucher is valid until *30 June 2024.*

✨ Don\'t wait any longer, hurry and grab our kurta now!

Visit our stores for an in-person experience:-
📍BOBROCK @ Shah Alam
Lot F15, Level 1
Plaza Shah Alam, Shah Alam

📍BOBROCK @ Wangsa Maju
Lot 1-52, Level 1
Wangsa Walk Mall, Kuala Lumpur

Or visit
https://www.bobrock.com.my/collections/baju-melayu-modern-kurta',
                'mime_type' => 'image/jpeg',
                'created_at' => '2024-06-10 23:17:22',
                'updated_at' => '2024-06-10 23:17:22',
            ),
        ));
        
        
    }
}