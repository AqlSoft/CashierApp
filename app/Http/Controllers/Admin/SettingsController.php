<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\Setting;

use Illuminate\Http\Request;

class SettingsController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        $vars = [
            'countries' => Country::all(),
            'cities' => City::all(),
            'regions' => Region::all(),
            'settings' => $settings,

        ];

        $timezones = [
            [
                'name_ar' => 'ميدواي',
                'name_en' => 'Midway',
                'tz_value' => '(UTC-11:00)'
            ],
            [
                'name_ar' => 'نيوي',
                'name_en' => 'Niue',
                'tz_value' => '(UTC-11:00)'
            ],
            [
                'name_ar' => 'باغو باغو',
                'name_en' => 'Pago Pago',
                'tz_value' => '(UTC-11:00)'
            ],
            [
                'name_ar' => 'أداك',
                'name_en' => 'Adak',
                'tz_value' => '(UTC-10:00)'
            ],
            [
                'name_ar' => 'هونولولو',
                'name_en' => 'Honolulu',
                'tz_value' => '(UTC-10:00)'
            ],
            [
                'name_ar' => 'جونستون',
                'name_en' => 'Johnston',
                'tz_value' => '(UTC-10:00)'
            ],
            [
                'name_ar' => 'راروتونغا',
                'name_en' => 'Rarotonga',
                'tz_value' => '(UTC-10:00)'
            ],
            [
                'name_ar' => 'تاهيتي',
                'name_en' => 'Tahiti',
                'tz_value' => '(UTC-10:00)'
            ],
            [
                'name_ar' => 'جزر ماركيساس',
                'name_en' => 'Marquesas',
                'tz_value' => '(UTC-09:30)'
            ],
            [
                'name_ar' => 'أنكوراج',
                'name_en' => 'Anchorage',
                'tz_value' => '(UTC-09:00)'
            ],
            [
                'name_ar' => 'غامبير',
                'name_en' => 'Gambier',
                'tz_value' => '(UTC-09:00)'
            ],
            [
                'name_ar' => 'جونو',
                'name_en' => 'Juneau',
                'tz_value' => '(UTC-09:00)'
            ],
            [
                'name_ar' => 'نوم',
                'name_en' => 'Nome',
                'tz_value' => '(UTC-09:00)'
            ],
            [
                'name_ar' => 'سيتكا',
                'name_en' => 'Sitka',
                'tz_value' => '(UTC-09:00)'
            ],
            [
                'name_ar' => 'ياكوتات',
                'name_en' => 'Yakutat',
                'tz_value' => '(UTC-09:00)'
            ],
            [
                'name_ar' => 'داوسون',
                'name_en' => 'Dawson',
                'tz_value' => '(UTC-08:00)'
            ],
            [
                'name_ar' => 'لوس أنجلوس',
                'name_en' => 'Los Angeles',
                'tz_value' => '(UTC-08:00)'
            ],
            [
                'name_ar' => 'ميتلاكاتلا',
                'name_en' => 'Metlakatla',
                'tz_value' => '(UTC-08:00)'
            ],
            [
                'name_ar' => 'بيتكيرن',
                'name_en' => 'Pitcairn',
                'tz_value' => '(UTC-08:00)'
            ],
            [
                'name_ar' => 'سانتا إيزابيل',
                'name_en' => 'Santa Isabel',
                'tz_value' => '(UTC-08:00)'
            ],
            [
                'name_ar' => 'تيخوانا',
                'name_en' => 'Tijuana',
                'tz_value' => '(UTC-08:00)'
            ],
            [
                'name_ar' => 'فانكوفر',
                'name_en' => 'Vancouver',
                'tz_value' => '(UTC-08:00)'
            ],
            [
                'name_ar' => 'وايت هورس',
                'name_en' => 'Whitehorse',
                'tz_value' => '(UTC-08:00)'
            ],
            [
                'name_ar' => 'بويز',
                'name_en' => 'Boise',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'كامبريدج باي',
                'name_en' => 'Cambridge Bay',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'تشيهواهوا',
                'name_en' => 'Chihuahua',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'كريستون',
                'name_en' => 'Creston',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'داوسون كريك',
                'name_en' => 'Dawson Creek',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'دنفر',
                'name_en' => 'Denver',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'إدمونتون',
                'name_en' => 'Edmonton',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'هيرموسيلو',
                'name_en' => 'Hermosillo',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'إينوفيك',
                'name_en' => 'Inuvik',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'مازاتلان',
                'name_en' => 'Mazatlan',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'أوجيناغا',
                'name_en' => 'Ojinaga',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'فينيكس',
                'name_en' => 'Phoenix',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'شيب روك',
                'name_en' => 'Shiprock',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'يلونايف',
                'name_en' => 'Yellowknife',
                'tz_value' => '(UTC-07:00)'
            ],
            [
                'name_ar' => 'باهيا بانديراس',
                'name_en' => 'Bahia Banderas',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'بليز',
                'name_en' => 'Belize',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'بيولا (نورث داكوتا)',
                'name_en' => 'Beulah (North Dakota)',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'كانكون',
                'name_en' => 'Cancun',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'سنتر (نورث داكوتا)',
                'name_en' => 'Center (North Dakota)',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'شيكاغو',
                'name_en' => 'Chicago',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'كوستاريكا',
                'name_en' => 'Costa Rica',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'جزيرة القيامة',
                'name_en' => 'Easter',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'السلفادور',
                'name_en' => 'El Salvador',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'جزر غالاباغوس',
                'name_en' => 'Galapagos',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'غواتيمالا',
                'name_en' => 'Guatemala',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'نوكس (إنديانا)',
                'name_en' => 'Knox (Indiana)',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'ماناغوا',
                'name_en' => 'Managua',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'ماتاموروس',
                'name_en' => 'Matamoros',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'مينوميني',
                'name_en' => 'Menominee',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'ميريدا',
                'name_en' => 'Merida',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'مدينة مكسيكو',
                'name_en' => 'Mexico City',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'مونتيري',
                'name_en' => 'Monterrey',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'نيو سالم (نورث داكوتا)',
                'name_en' => 'New Salem (North Dakota)',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'رايني ريفر',
                'name_en' => 'Rainy River',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'رانكين إنليت',
                'name_en' => 'Rankin Inlet',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'ريجينا',
                'name_en' => 'Regina',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'ريزولوت',
                'name_en' => 'Resolute',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'سويفت كورنت',
                'name_en' => 'Swift Current',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'تيغوسيغالبا',
                'name_en' => 'Tegucigalpa',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'تيل سيتي (إنديانا)',
                'name_en' => 'Tell City (Indiana)',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'وينيبيغ',
                'name_en' => 'Winnipeg',
                'tz_value' => '(UTC-06:00)'
            ],
            [
                'name_ar' => 'أتيكوكان',
                'name_en' => 'Atikokan',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'بوغوتا',
                'name_en' => 'Bogota',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'كايمان',
                'name_en' => 'Cayman',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'ديترويت',
                'name_en' => 'Detroit',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'غراند تورك',
                'name_en' => 'Grand Turk',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'غواياكيل',
                'name_en' => 'Guayaquil',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'هافانا',
                'name_en' => 'Havana',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'إنديانابوليس (إنديانا)',
                'name_en' => 'Indianapolis (Indiana)',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'إيكالويت',
                'name_en' => 'Iqaluit',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'جامايكا',
                'name_en' => 'Jamaica',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'ليما',
                'name_en' => 'Lima',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'لويزفيل (كنتاكي)',
                'name_en' => 'Louisville (Kentucky)',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'مارينغو (إنديانا)',
                'name_en' => 'Marengo (Indiana)',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'مونتيسيلو (كنتاكي)',
                'name_en' => 'Monticello (Kentucky)',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'مونتريال',
                'name_en' => 'Montreal',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'ناساو',
                'name_en' => 'Nassau',
                'tz_value' => '(UTC-05:00)'
            ],

            // ... (الجزء الأول من المصفوفة الذي تم تقديمه سابقًا) ...
            [
                'name_ar' => 'نيبيغون',
                'name_en' => 'Nipigon',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'بنما',
                'name_en' => 'Panama',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'بانغنيرتونغ',
                'name_en' => 'Pangnirtung',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'بيترسبورغ (إنديانا)',
                'name_en' => 'Petersburg (Indiana)',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'بورت أو برانس',
                'name_en' => 'Port-au-Prince',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'ثاندر باي',
                'name_en' => 'Thunder Bay',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'تورنتو',
                'name_en' => 'Toronto',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'فيفاي (إنديانا)',
                'name_en' => 'Vevay (Indiana)',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'فينسينس (إنديانا)',
                'name_en' => 'Vincennes (Indiana)',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'ويناماك (إنديانا)',
                'name_en' => 'Winamac (Indiana)',
                'tz_value' => '(UTC-05:00)'
            ],
            [
                'name_ar' => 'كاراكاس',
                'name_en' => 'Caracas',
                'tz_value' => '(UTC-04:30)'
            ],
            [
                'name_ar' => 'أنغيلا',
                'name_en' => 'Anguilla',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'أنتيغوا',
                'name_en' => 'Antigua',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'أروبا',
                'name_en' => 'Aruba',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'أسونسيون',
                'name_en' => 'Asuncion',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'بربادوس',
                'name_en' => 'Barbados',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'برمودا',
                'name_en' => 'Bermuda',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'بلانك سابلون',
                'name_en' => 'Blanc-Sablon',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'بوا فيستا',
                'name_en' => 'Boa Vista',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'كامبو غراندي',
                'name_en' => 'Campo Grande',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'كويابا',
                'name_en' => 'Cuiaba',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'كوراساو',
                'name_en' => 'Curacao',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'دومينيكا',
                'name_en' => 'Dominica',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'إيرونيبي',
                'name_en' => 'Eirunepe',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'غلاس باي',
                'name_en' => 'Glace Bay',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'غوس باي',
                'name_en' => 'Goose Bay',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'غرينادا',
                'name_en' => 'Grenada',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'غواديلوب',
                'name_en' => 'Guadeloupe',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'غيانا',
                'name_en' => 'Guyana',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'هاليفاكس',
                'name_en' => 'Halifax',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'كرالينديجك',
                'name_en' => 'Kralendijk',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'لاباز',
                'name_en' => 'La Paz',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'لوير برينس',
                'name_en' => 'Lower Princes',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'ماناوس',
                'name_en' => 'Manaus',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'ماريغوت',
                'name_en' => 'Marigot',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'مارتينيك',
                'name_en' => 'Martinique',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'مونكتون',
                'name_en' => 'Moncton',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'مونتسيرات',
                'name_en' => 'Montserrat',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'بالمر (أنتاركتيكا)',
                'name_en' => 'Palmer (Antarctica)',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'بورت أوف سبين',
                'name_en' => 'Port of Spain',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'بورتو فيلهو',
                'name_en' => 'Porto Velho',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'بورتوريكو',
                'name_en' => 'Puerto Rico',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'ريو برانكو',
                'name_en' => 'Rio Branco',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'سانتياغو',
                'name_en' => 'Santiago',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'سانتو دومينغو',
                'name_en' => 'Santo Domingo',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'سانت بارتيليمي',
                'name_en' => 'St. Barthelemy',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'سانت كيتس',
                'name_en' => 'St. Kitts',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'سانت لوسيا',
                'name_en' => 'St. Lucia',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'سانت توماس',
                'name_en' => 'St. Thomas',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'سانت فنسنت',
                'name_en' => 'St. Vincent',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'ثول',
                'name_en' => 'Thule',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'تورتولا',
                'name_en' => 'Tortola',
                'tz_value' => '(UTC-04:00)'
            ],
            [
                'name_ar' => 'سانت جونز',
                'name_en' => 'St. Johns',
                'tz_value' => '(UTC-03:30)'
            ],
            [
                'name_ar' => 'أراغواينا',
                'name_en' => 'Araguaina',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'باهيا',
                'name_en' => 'Bahia',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'بيليم',
                'name_en' => 'Belem',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'بوينس آيرس (الأرجنتين)',
                'name_en' => 'Buenos Aires (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'كاتاماركا (الأرجنتين)',
                'name_en' => 'Catamarca (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'كايين',
                'name_en' => 'Cayenne',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'قرطبة (الأرجنتين)',
                'name_en' => 'Cordoba (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'فورتاليزا',
                'name_en' => 'Fortaleza',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'غودثاب',
                'name_en' => 'Godthab',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'جوجوي (الأرجنتين)',
                'name_en' => 'Jujuy (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'لا ريوخا (الأرجنتين)',
                'name_en' => 'La Rioja (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'ماسيو',
                'name_en' => 'Maceio',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'مندوزا (الأرجنتين)',
                'name_en' => 'Mendoza (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'ميكلون',
                'name_en' => 'Miquelon',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'مونتيفيديو',
                'name_en' => 'Montevideo',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'باراماريبو',
                'name_en' => 'Paramaribo',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'ريسيفي',
                'name_en' => 'Recife',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'ريو غالغيغوس (الأرجنتين)',
                'name_en' => 'Rio Gallegos (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'روثيرا (أنتاركتيكا)',
                'name_en' => 'Rothera (Antarctica)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'سالتا (الأرجنتين)',
                'name_en' => 'Salta (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'سان خوان (الأرجنتين)',
                'name_en' => 'San Juan (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'سان لويس (الأرجنتين)',
                'name_en' => 'San Luis (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'سانتاريم',
                'name_en' => 'Santarem',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'ساو باولو',
                'name_en' => 'Sao Paulo',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'ستانلي (جزر فوكلاند)',
                'name_en' => 'Stanley (Falkland Islands)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'توكومان (الأرجنتين)',
                'name_en' => 'Tucuman (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'نيويورك',
                'name_en' => 'New York',
                'tz_value' => '(UTC-05:00)'
            ],

            [
                'name_ar' => 'أوشوايا (الأرجنتين)',
                'name_en' => 'Ushuaia (Argentina)',
                'tz_value' => '(UTC-03:00)'
            ],
            [
                'name_ar' => 'نورونها',
                'name_en' => 'Noronha',
                'tz_value' => '(UTC-02:00)'
            ],
            [
                'name_ar' => 'جورجيا الجنوبية',
                'name_en' => 'South Georgia',
                'tz_value' => '(UTC-02:00)'
            ],
            [
                'name_ar' => 'جزر الأزور',
                'name_en' => 'Azores',
                'tz_value' => '(UTC-01:00)'
            ],
            [
                'name_ar' => 'الرأس الأخضر',
                'name_en' => 'Cape Verde',
                'tz_value' => '(UTC-01:00)'
            ],
            [
                'name_ar' => 'سكورسبيسوند',
                'name_en' => 'Scoresbysund',
                'tz_value' => '(UTC-01:00)'
            ],
            [
                'name_ar' => 'أبيدجان',
                'name_en' => 'Abidjan',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'أكرا',
                'name_en' => 'Accra',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'باماكو',
                'name_en' => 'Bamako',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'بانجول',
                'name_en' => 'Banjul',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'بيساو',
                'name_en' => 'Bissau',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'جزر الكناري',
                'name_en' => 'Canary',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'الدار البيضاء',
                'name_en' => 'Casablanca',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'كوناكري',
                'name_en' => 'Conakry',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'داكار',
                'name_en' => 'Dakar',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'دانماركسهافن',
                'name_en' => 'Danmarkshavn',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'دبلن',
                'name_en' => 'Dublin',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'العيون',
                'name_en' => 'El Aaiun',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'جزر فارو',
                'name_en' => 'Faroe',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'فريتاون',
                'name_en' => 'Freetown',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'غيرنسي',
                'name_en' => 'Guernsey',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'جزيرة مان',
                'name_en' => 'Isle of Man',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'جيرسي',
                'name_en' => 'Jersey',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'لشبونة',
                'name_en' => 'Lisbon',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'لومي',
                'name_en' => 'Lome',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'لندن',
                'name_en' => 'London',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'ماديرا',
                'name_en' => 'Madeira',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'مونروفيا',
                'name_en' => 'Monrovia',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'نواكشوط',
                'name_en' => 'Nouakchott',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'واغادوغو',
                'name_en' => 'Ouagadougou',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'ريكيافيك',
                'name_en' => 'Reykjavik',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'ساو تومي',
                'name_en' => 'Sao Tome',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'سانت هيلينا',
                'name_en' => 'St. Helena',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'توقيت عالمي موحد',
                'name_en' => 'UTC',
                'tz_value' => '(UTC+00:00)'
            ],
            [
                'name_ar' => 'الجزائر',
                'name_en' => 'Algiers',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'أمستردام',
                'name_en' => 'Amsterdam',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'أندورا',
                'name_en' => 'Andorra',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'بانغي',
                'name_en' => 'Bangui',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'بلغراد',
                'name_en' => 'Belgrade',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'برلين',
                'name_en' => 'Berlin',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'براتيسلافا',
                'name_en' => 'Bratislava',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'برازافيل',
                'name_en' => 'Brazzaville',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'بروكسل',
                'name_en' => 'Brussels',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'بودابست',
                'name_en' => 'Budapest',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'بوسينغن',
                'name_en' => 'Busingen',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'سبتة',
                'name_en' => 'Ceuta',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'كوبنهاغن',
                'name_en' => 'Copenhagen',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'دوالا',
                'name_en' => 'Douala',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'جبل طارق',
                'name_en' => 'Gibraltar',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'كينشاسا',
                'name_en' => 'Kinshasa',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'لاغوس',
                'name_en' => 'Lagos',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'ليبرفيل',
                'name_en' => 'Libreville',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'ليوبليانا',
                'name_en' => 'Ljubljana',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'لونغياربين (سفالبارد)',
                'name_en' => 'Longyearbyen',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'لواندا',
                'name_en' => 'Luanda',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'لوكسمبورغ',
                'name_en' => 'Luxembourg',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'مدريد',
                'name_en' => 'Madrid',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'مالابو',
                'name_en' => 'Malabo',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'مالطا',
                'name_en' => 'Malta',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'موناكو',
                'name_en' => 'Monaco',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'انجمينا',
                'name_en' => 'Ndjamena',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'نيامي',
                'name_en' => 'Niamey',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'أوسلو',
                'name_en' => 'Oslo',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'باريس',
                'name_en' => 'Paris',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'بودغوريتسا',
                'name_en' => 'Podgorica',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'بورتو نوفو',
                'name_en' => 'Porto-Novo',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'براغ',
                'name_en' => 'Prague',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'روما',
                'name_en' => 'Rome',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'سان مارينو',
                'name_en' => 'San Marino',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'سراييفو',
                'name_en' => 'Sarajevo',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'سكوبيه',
                'name_en' => 'Skopje',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'ستوكهولم',
                'name_en' => 'Stockholm',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'تيرانا',
                'name_en' => 'Tirane',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'طرابلس',
                'name_en' => 'Tripoli',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'تونس',
                'name_en' => 'Tunis',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'فادوز',
                'name_en' => 'Vaduz',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'الفاتيكان',
                'name_en' => 'Vatican',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'فيينا',
                'name_en' => 'Vienna',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'وارسو',
                'name_en' => 'Warsaw',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'ويندهوك',
                'name_en' => 'Windhoek',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'زغرب',
                'name_en' => 'Zagreb',
                'tz_value' => '(UTC+01:00)'
            ],
            [
                'name_ar' => 'زيورخ',
                'name_en' => 'Zurich',
                'tz_value' => '(UTC+01:00)'
            ],
        ];

        $vars['timezones'] = $timezones;

        return view('admin.setting.index', $vars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $setting = Setting::findOrFail($id);

        // تحديد الحقل الذي تم تعديله
        $field = array_key_first($request->except('_token', '_method'));

        // تحديث الحقل المحدد فقط
        $setting->update([$field => $request->input($field)]);

        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
