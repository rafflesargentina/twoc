<?php

namespace Raffles\Modules\Aptoclick\Database\Seeds;

use Raffles\Modules\Aptoclick\Models\{Property, User};

use Illuminate\Database\Seeder;

class UsersAndPropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = module_path('aptoclick', 'Database/APTOCLICK_Report.csv', 'app');
        $handle = fopen($file, "r");

        if (empty($handle) === false) {
            while (($data = fgetcsv($handle, 1000, ";")) !== false ) {
                $arrResult[] = $data;
            }
            fclose($handle);
        }

        foreach (array_slice($arrResult, 1) as $result) {
            $firstName = $result[1];
            $lastName = $result[2];
            $email = $result[3];
            $mobile = $result[4];
            $propertyTypeId = $result[5];
            $coveredSurface = $result[6];
            $rooms = $result[7];
            $price = str_replace(',', '', $result[8]);
            $streetName = $result[9];
            $floorNumber = $result[10];
            $streetNumber = $result[11];
            $zip = $result[12];
            $locality = $result[13];
            $state = $result[14];
            $sublocality = $result[15];

            $user = User::firstOrCreate(['email' => $email], ['email' => $email, 'first_name' => $firstName, 'last_name' => $lastName, 'password' => str_random(), 'slug' => str_slug($email)]);
            $user->contact()->firstOrCreate(['mobile' => $mobile], ['mobile' => $mobile]);

            $property = $user->properties()->create(['covered_surface' => $coveredSurface, 'sell_price' => $price, 'property_type_id' => $propertyTypeId, 'rooms' => $rooms, 'slug' => str_slug($streetName.' '.$streetNumber), 'title' => $streetName.' '.$streetNumber]);

            $property->address()->create(['country' => 'México', 'floor_number' => $floorNumber, 'locality' => $locality, 'state' => $state, 'street_name' => $streetName, 'street_number' => $streetNumber, 'sublocality' => $sublocality, 'zip' => $zip]);

            $location = $this->getGeoLocation($streetName.' '.$streetNumber.', '.$locality);
            if ($location) {
                $property->map()->create($location);
            }
        }
    }

    function getGeoLocation($addr)
    {
        $cleanAddress = str_replace(" ", "+", $addr);
        $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$cleanAddress."&sensor=false&key=".env("GOOGLE_PLACES_API");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $geoloc = json_decode(curl_exec($ch), true);
        switch ($geoloc['status']) {
        case 'ZERO_RESULTS':
            return 0;
            break;
        case 'OK':
            return $geoloc['results'][0]['geometry']['location'];
            break;
        }
    }
}
