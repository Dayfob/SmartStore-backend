<?php

namespace App\Console\Commands\database;

use App\Models\Admin\Employer;
use App\Models\Admin\News;
use App\Models\Product\Product;
use App\Models\Product\ProductBrand;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductSubcategory;
use App\Models\User\Cart;
use App\Models\User\User;
use App\Models\User\Wishlist;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class FillDBCommand extends Command
{
    protected $signature = 'db:fill_database';
    protected $description = 'Заполнить базу данных';

    public function handle()
    {
        // администратор
        $employer = new Employer();
        $employer->name = 'admin';
        $employer->password = Hash::make('admin');
        $employer->email = 'admin@admin.com';
        $employer->save();
        $employerId = (Employer::whereEmail('admin@admin.com')->first())->id;

        // новости
        $news1 = new News();
        $news1->slug = 'make_your_choice';
        $news1->title = 'Make your choice: Cascading discounts or Cashback up to 20%';
        $news1->image_url = 'news1.png';
        $news1->text = 'Introducing our super promotions: Cashback up to 20% and Cascading discounts from 20 to 70%. From April 7 to May 2 inclusive, you decide what is profitable and receive a 30% discount coupon for your next purchase in any case. Your choice will be right - it remains only to make it.';
        $news1->user_id = $employerId;
        $news1->save();

        $news2 = new News();
        $news2->slug = 'what_is_insteon';
        $news2->title = 'What is Insteon?';
        $news2->image_url = 'news2.png';
        $news2->text = 'Insteon labels itself the most-reliable home automation technology using both existing wires (power line) and radio frequency communication. They add smart home technology to lighting, appliances, and much more. Remote Control - Switches can be remotely controlled from almost any device in your home: Sensors monitoring doors, windows, leaks and more, remotes, keypads and other wall switches throughout your home, even your smartphone when used with the Insteon Hub.';
        $news2->user_id = $employerId;
        $news2->save();

        $news3 = new News();
        $news3->slug = 'one_way_to_pay';
        $news3->title = 'One way to pay, so many places to shop';
        $news3->image_url = 'news3.png';
        $news3->text = 'With Amazon Pay, you can use your Amazon account to make purchases on tens of thousands of sites around the world. You can also use Amazon Pay to donate to causes you care about most. Either way, enjoy the freedom of a checkout experience you know and trust - all without having to create a new account, enter personal information or worry about security.';
        $news3->user_id = $employerId;
        $news3->save();

        // категории
        $category1 = new ProductCategory();
        $category1->name = 'Cameras';
        $category1->slug = 'cameras';
        $category1->description = 'These are cameras.';
        $category1->save();
        $category1Id = ProductCategory::whereSlug('cameras')->first()->id;

        $category2 = new ProductCategory();
        $category2->name = 'Lighting';
        $category2->slug = 'lighting';
        $category2->description = 'These are lighting devices.';
        $category2->save();
        $category2Id = ProductCategory::whereSlug('lighting')->first()->id;

        $category3 = new ProductCategory();
        $category3->name = 'Temperature';
        $category3->slug = 'temperature';
        $category3->description = 'These are temperature control devices.';
        $category3->save();
        $category3Id = ProductCategory::whereSlug('temperature')->first()->id;

        // подкатегории категории 1
        $subcategory1_1 = new ProductSubcategory();
        $subcategory1_1->category_id = $category1Id;
        $subcategory1_1->name = 'Surveillance';
        $subcategory1_1->slug = 'cameras_surveillance';
        $subcategory1_1->description = 'These are surveillance devices.';
        $subcategory1_1->attributes = ["Product number",
                                        "UPC",
                                        "Camera",
                                        "Resolution",
                                        "Video Format",
                                        "Battery",
                                        "Estimated Battery Life",
                                        "Connection",
                                        "Detection distance",
                                        "Size (H x W x D)",
                                        "Weight"];
        $subcategory1_1->image_url = 'subcategory_surveillance_icon.jpg';
        $subcategory1_1->save();
        $subcategory1_1Id = ProductSubcategory::whereSlug('cameras_surveillance')->first()->id;

        $subcategory1_2 = new ProductSubcategory();
        $subcategory1_2->category_id = $category1Id;
        $subcategory1_2->name = 'Doorbells';
        $subcategory1_2->slug = 'cameras_doorbells';
        $subcategory1_2->description = 'These are doorbells.';
        $subcategory1_2->attributes = ["Product number",
                                        "UPC",
                                        "Requirements",
                                        "Standards",
                                        "Power Requirement",
                                        "Size (H x W x D)",
                                        "Weight"];
        $subcategory1_2->image_url = 'subcategory_doorbells_icon.jpg';
        $subcategory1_2->save();
        $subcategory1_2Id = ProductSubcategory::whereSlug('cameras_doorbells')->first()->id;

        $subcategory1_3 = new ProductSubcategory();
        $subcategory1_3->category_id = $category1Id;
        $subcategory1_3->name = 'Cameras Accessories';
        $subcategory1_3->slug = 'cameras_accessories';
        $subcategory1_3->description = 'These are accessories.';
        $subcategory1_3->attributes = ["UPC", "Color"];
        $subcategory1_3->image_url = 'subcategory_cameras_accessories_icon.png';
        $subcategory1_3->save();
        $subcategory1_3Id = ProductSubcategory::whereSlug('cameras_accessories')->first()->id;

        // подкатегории категории 2
        $subcategory2_1 = new ProductSubcategory();
        $subcategory2_1->category_id = $category2Id;
        $subcategory2_1->name = 'Bulbs';
        $subcategory2_1->slug = 'lighting_bulbs';
        $subcategory2_1->description = 'Это лапочки.';
        $subcategory2_1->attributes = ["Product number", "UPC", "Color", "Brightness", "Working lifespan", "Socket", "Power"];
        $subcategory2_1->image_url = 'subcategory_bulbs_icon.jpg';
        $subcategory2_1->save();
        $subcategory2_1Id = ProductSubcategory::whereSlug('lighting_bulbs')->first()->id;

        $subcategory2_2 = new ProductSubcategory();
        $subcategory2_2->category_id = $category2Id;
        $subcategory2_2->name = 'Outlets';
        $subcategory2_2->slug = 'lighting_outlets';
        $subcategory2_2->description = 'These are outlets.';
        $subcategory2_2->attributes = ["Product number", "UPC", "Color", "Software", "Material", "Size (H x W x D)", "Weight"];
        $subcategory2_2->image_url = 'subcategory_outlets_icon.jpg';
        $subcategory2_2->save();
        $subcategory2_2Id = ProductSubcategory::whereSlug('lighting_outlets')->first()->id;

        $subcategory2_3 = new ProductSubcategory();
        $subcategory2_3->category_id = $category2Id;
        $subcategory2_3->name = 'Lighting Accessories';
        $subcategory2_3->slug = 'lighting_accessories';
        $subcategory2_3->description = 'These are accessories.';
        $subcategory2_3->attributes = ["UPC", "Color"];
        $subcategory2_3->image_url = 'subcategory_lighting_accessories_icon.png';
        $subcategory2_3->save();
        $subcategory2_3Id = ProductSubcategory::whereSlug('lighting_accessories')->first()->id;

        // подкатегории категории 3
        $subcategory3_1 = new ProductSubcategory();
        $subcategory3_1->category_id = $category3Id;
        $subcategory3_1->name = 'Thermostats';
        $subcategory3_1->slug = 'temperature_thermostats';
        $subcategory3_1->description = 'These are thermostats.';
        $subcategory3_1->attributes = ["Product number", "UPC", "Color", "Display", "Sensors",
                                        "Connection method", "Languages", "Power consumption"];
        $subcategory3_1->image_url = 'subcategory_thermostats_icon.png';
        $subcategory3_1->save();
        $subcategory3_1Id = ProductSubcategory::whereSlug('temperature_thermostats')->first()->id;

        $subcategory3_2 = new ProductSubcategory();
        $subcategory3_2->category_id = $category3Id;
        $subcategory3_2->name = 'Vents';
        $subcategory3_2->slug = 'temperature_vents';
        $subcategory3_2->description = 'These are vents.';
        $subcategory3_2->attributes = ["Product number", "UPC", "Color", "Material",
                                        "Compatibility", "Size (H x W x D)"];
        $subcategory3_2->image_url = 'subcategory_vents_icon.jpg';
        $subcategory3_2->save();
        $subcategory3_2Id = ProductSubcategory::whereSlug('temperature_vents')->first()->id;

        $subcategory3_3 = new ProductSubcategory();
        $subcategory3_3->category_id = $category3Id;
        $subcategory3_3->name = 'Temperature Accessories';
        $subcategory3_3->slug = 'temperature_accessories';
        $subcategory3_3->description = 'These are accessories.';
        $subcategory3_3->attributes = ["UPC", "Color"];
        $subcategory3_3->image_url = 'subcategory_temperature_accessories_icon.webp';
        $subcategory3_3->save();
        $subcategory3_3Id = ProductSubcategory::whereSlug('temperature_accessories')->first()->id;

        // бренды
        $brand1 = new ProductBrand();
        $brand1->name = 'Honeywell';
        $brand1->slug = 'honeywell';
        $brand1->description = 'This is Honeywell.';
        $brand1->save();
        $brand1Id = ProductBrand::whereSlug('honeywell')->first()->id;

        $brand2 = new ProductBrand();
        $brand2->name = 'Google';
        $brand2->slug = 'google';
        $brand2->description = 'This is Google.';
        $brand2->save();
        $brand2Id = ProductBrand::whereSlug('google')->first()->id;

        $brand3 = new ProductBrand();
        $brand3->name = 'Johnson Controls';
        $brand3->slug = 'johnson_controls';
        $brand3->description = 'This is Johnson Controls.';
        $brand3->save();
        $brand3Id = ProductBrand::whereSlug('johnson_controls')->first()->id;

        // продукты категории 1 подкатегории 1
        $product1_1_1 = new Product();
        $product1_1_1->name = 'Honeywell Smart Home Security Indoor Motion Monitoring System';
        $product1_1_1->slug = 'honeywell_smart_home_security';
        $product1_1_1->image_url = 'product1.jpg';
        $product1_1_1->description = "Expand your system so you can keep track of more rooms in the house. Take outdoor awareness with up to 23 feet (7m) long distance detection and 90 degree field of view. Night vision means it's on the watch around the clock, with a 2 year battery (Battery life varies with typical usage.) Small animal (up to 79 lb.) will not cause false alarms, so don't worry about your pet calling the system.";
        $product1_1_1->category_id = $category1Id;
        $product1_1_1->subcategory_id = $subcategory1_1Id;
        $product1_1_1->brand_id = $brand1Id;
        $product1_1_1->amount_left = 100;
        $product1_1_1->price = 60990;
        $product1_1_1->attributes = ["RCHSIMV1/W",
                                        "085267439022",
                                        "90 field of view",
                                        "QVGA (320x240)",
                                        "10 seconds color video clipH.264 @ 10fps",
                                        "Lithium 3 CR123A",
                                        "Up to 2 years based on typical usage",
                                        "Protocol Honeywell Secure Wiselink",
                                        "up to 7 meters",
                                        "125,7 x 50,8 x 46,2 мм",
                                        "With sliding plate 165 g; With table mount 180 g"];
        $product1_1_1->save();

        $product1_1_2 = new Product();
        $product1_1_2->name = 'Blink Mini - Compact Smart Indoor Security Camera';
        $product1_1_2->slug = 'blink_mini';
        $product1_1_2->image_url = 'product2.jpg';
        $product1_1_2->description =
            "See what's happening live in HD video anytime - day or night. 1080P HD indoor, plug-in security camera with motion detection and two-way audio that allows you to monitor the inside of your home day and night. Get alerts on your smartphone when motion is detected, or set motion detection zones so you can see what matters most See, hear, and talk to people and pets in your home on your smartphone with Live View and two-way audio Blink Mini (live view is not Set up in minutes - just plug in your camera, connect it to Wi-Fi, and add it to the Blink app. Blink Mini includes a free trial of a Blink cloud storage subscription until December 31, 2020. For added ease of use, pair Blink Mini with a supported Alexa-enabled device for live viewing, viewing recorded videos, and arming and disarming armed using only your voice.";
        $product1_1_2->category_id = $category1Id;
        $product1_1_2->subcategory_id = $subcategory1_1Id;
        $product1_1_2->brand_id = $brand3Id;
        $product1_1_2->amount_left = 100;
        $product1_1_2->price = 15990;
        $product1_1_2->attributes = ["-",
                                        "-",
                                        "110 field of view",
                                        "Record and view 1080p HD video during the day and infrared HD night vision after dark",
                                        "10 seconds color video clipH.264 @ 10fps",
                                        "Lithium 3 CR123A", "Up to 2 years based on typical usage",
                                        "Supports 2.4GHz 802.11g/n; does not support connection to ad hoc (or peer-to-peer) or paid WiFi networks. A minimum download speed of 2 Mbps is required.",
                                        "Up to 7 meters", "125.7 x 50.8 x 46.2 mm",
                                        "With sliding plate 165g; With table mount 180 g"];
        $product1_1_2->save();

        // продукты категории 1 подкатегории 2
        $product1_2_1 = new Product();
        $product1_2_1->name = 'August Doorbell Cam Pro';
        $product1_2_1->slug = 'august_cam_pro';
        $product1_2_1->image_url = 'product3.jpg';
        $product1_2_1->description = "August Doorbell Cam Pro. See who's at the door when you're not at home. Built-in spotlight delivers full color HD video even in the dark. See and talk to visitors. Greet friends and family with two-way audio or tell unwanted visitors to leave. Full color HD at night. See what's happening outside - even in the dark. Always capture what's important. Motion-activated August HindSight™ captures footage that shows you the whole story from the moment a person approaches to the moment they leave.";
        $product1_2_1->category_id = $category1Id;
        $product1_2_1->subcategory_id = $subcategory1_2Id;
        $product1_2_1->brand_id = $brand1Id;
        $product1_2_1->amount_left = 100;
        $product1_2_1->price = 50990;
        $product1_2_1->attributes = ["AUG-AB02-M02-S02",
                                        "853984006250",
                                        "Existing wired door. Bell 12-24VAC Wired power. mechanical doorbell. Wi-Fi® Internet connection. (802.11 b/g/n 2.4GHz or 5GHz). Bluetooth ready smartphone. Free August app for iOS or Android.",
                                        "Specification Bluetooth v4.0 (Bluetooth Smart), 5 GHz, 2.4 GHz 80211(B/G/N)",
                                        "Wired power 12-24VAC",
                                        "2.9 x 0.9 x 2.9",
                                        "0.25 lb"];
        $product1_2_1->save();

        $product1_2_2 = new Product();
        $product1_2_2->name = 'Ring Video Doorbell Pro';
        $product1_2_2->slug = 'ring_pro';
        $product1_2_2->image_url = 'product4.jpg';
        $product1_2_2->description = "Product Description: With Ring Doorbell Pro, you can see who is at your door in the highest video quality. It connects to your home Wi-Fi network and sends notifications to your smartphone or tablet when it detects motion at your front door. The free Ring app is available for Apple, Android, and Windows 10 devices.";
        $product1_2_2->category_id = $category1Id;
        $product1_2_2->subcategory_id = $subcategory1_2Id;
        $product1_2_2->brand_id = $brand3Id;
        $product1_2_2->amount_left = 87;
        $product1_2_2->price = 90490;
        $product1_2_2->attributes = ["8VR1P6-0EN0",
                                        "852239005208",
                                        "Existing wired door. call 12-24VAC Wired power. mechanical doorbell. Wi-Fi® Internet connection. (802.11 b/g/n 2.4 GHz or 5 GHz). Bluetooth-ready smartphone. The free August app for iOS or Android.",
                                        "Specification Bluetooth v4.0 (Bluetooth Smart), 5 GHz, 2.4 GHz 80211(B/G/N)",
                                        "Wired power 12-24VAC",
                                        "4.50 x 1.85 x .80",
                                        "0.25 lb"];
        $product1_2_2->save();

        // продукты категории 1 подкатегории 3
        $product1_3_1 = new Product();
        $product1_3_1->name = 'Traditional Porch Companion Lamp Maximus Smart Light';
        $product1_3_1->slug = 'maximus_smart_light';
        $product1_3_1->image_url = 'product5.jpg';
        $product1_3_1->description = "Nice and low maintenance option to protect what matters. Bluetooth enabled for easy pairing with your existing smart security light. Works with Amazon Alexa and Google Assistant. Automatic lighting adjustment. Turn on/off in sync with maximus smart security light, turn on by motion and much more Die-cast aluminum fixture with frosted weather resistant glass cover Easy installation Replace your existing fixture with a new one, no additional wiring required.";
        $product1_3_1->category_id = $category1Id;
        $product1_3_1->subcategory_id = $subcategory1_3Id;
        $product1_3_1->brand_id = $brand3Id;
        $product1_3_1->amount_left = 25;
        $product1_3_1->price = 29900;
        $product1_3_1->attributes = ["853984006250", "Black"];
        $product1_3_1->save();

        $product1_3_2 = new Product();
        $product1_3_2->name = 'Porch companion lamp Maximus Smart Contemporary';
        $product1_3_2->slug = 'maximus_smart_contemporary';
        $product1_3_2->image_url = 'product5.jpg';
        $product1_3_2->description = "Nice and low maintenance option to protect what matters. Bluetooth enabled for easy pairing with your existing smart security light. Works with Amazon Alexa and Google Assistant. Automatic lighting adjustment. Turn on/off in sync with maximus smart security light, turn on by motion and much more Die-cast aluminum fixture with frosted weather resistant glass cover Easy installation Replace your existing fixture with a new one, no additional wiring required.";
        $product1_3_2->category_id = $category1Id;
        $product1_3_2->subcategory_id = $subcategory1_3Id;
        $product1_3_2->brand_id = $brand3Id;
        $product1_3_2->amount_left = 25;
        $product1_3_2->price = 29900;
        $product1_3_2->attributes = ["853984006320", "Black"];
        $product1_3_2->save();

        // продукты категории 2 подкатегории 1
        $product2_1_1 = new Product();
        $product2_1_1->name = 'Sengled Zigbee Dimmable Smart LED';
        $product2_1_1->slug = 'sengled_zigbee';
        $product2_1_1->image_url = 'product7.jpg';
        $product2_1_1->description = "Scenes: Manage groups of lights in scenes to instantly set the tone for any event. Light Graphs. Program your smart lights to turn on or off at your desired time, brightness, color and more.";
        $product2_1_1->category_id = $category2Id;
        $product2_1_1->subcategory_id = $subcategory2_1Id;
        $product2_1_1->brand_id = $brand1Id;
        $product2_1_1->amount_left = 87;
        $product2_1_1->price = 4490;
        $product2_1_1->attributes = ["E11-G13",
                                        "852239005208",
                                        "soft white",
                                        "Adjustable up to 800 lumens",
                                        "25 000 hours",
                                        "E26",
                                        "9 W"];
        $product2_1_1->save();

        $product2_1_2 = new Product();
        $product2_1_2->name = 'Ring A19 Smart LED Bulb';
        $product2_1_2->slug = 'ring_a19';
        $product2_1_2->image_url = 'product8.jpg';
        $product2_1_2->description = "Lights up anytime, anywhere. Add Ring Smart Lighting to any area of ​​your home and control them from the Ring app. Turn your lights on or off while you're away, set a schedule, and even link your lights to compatible ring video doorbells and cameras to see what happens when your lights detect movement Control your lights from anywhere The A19 Smart LED Bulb allows you to place smart lighting anywhere you need it inside or indoor outdoor lights Paired with Ring Bridge (included in starter kits or sold separately) you can set a schedule and turn the lights on and off remotely through the Ring app.";
        $product2_1_2->category_id = $category2Id;
        $product2_1_2->subcategory_id = $subcategory2_1Id;
        $product2_1_2->brand_id = $brand2Id;
        $product2_1_2->amount_left = 87;
        $product2_1_2->price = 8490;
        $product2_1_2->attributes = ["E11-G13",
                                        "852239005208",
                                        "soft white",
                                        "Adjustable up to 800 lumens",
                                        "25 000 hours",
                                        "E26",
                                        "9 W"];
        $product2_1_2->save();

        // продукты категории 2 подкатегории 2
        $product2_2_1 = new Product();
        $product2_2_1->name = 'Remote controlled dimmer socket Insteon';
        $product2_2_1->slug = 'insteon_socket';
        $product2_2_1->image_url = 'product9.jpg';
        $product2_2_1->description = "World's first remote controlled dimmable outlet! Sleek, integrated, clean and professional appearance for remote control of lamps. One remote controlled outlet and one standard (always on) outlet. Tamper-resistant shutter mechanism to protect against object mis-entry and electrical shock Switched outlet supports 'load sense' - manually turning on the load (under load) will turn on the outlet. Works with both Amazon Alexa and Google Assistant for voice control (requires Insteon hub, Alexa device and Google Assistant device sold separately)." ;
        $product2_2_1->category_id = $category2Id;
        $product2_2_1->subcategory_id = $subcategory2_2Id;
        $product2_2_1->brand_id = $brand3Id;
        $product2_2_1->amount_left = 87;
        $product2_2_1->price = 23500;
        $product2_2_1->attributes = ["2472DWH",
                                        "813922010251",
                                        "white",
                                        "Yes",
                                        "UV stabilized polycarbonate",
                                        "4.1 x 1.73 x 1.73",
                                        "120 grams"];
        $product2_2_1->save();

        $product2_2_2 = new Product();
        $product2_2_2->name = 'iDevices Smart WiFi Wall Socket';
        $product2_2_2->slug = 'iDevices_smart_WiFi';
        $product2_2_2->image_url = 'product10.jpg';
        $product2_2_2->description = "Dual Wi-Fi controlled wall outlet. Take your smart home to the next level with iDevices Wall Outlet, the only built-in Wi-Fi®-enabled outlet that is compatible with HomeKit™, Alexa and Google Assistant. With smart features such as individual outlet control and energy monitoring, iDevices Wall Outlet provides powerful functionality anywhere in your home without the need for a central hub or gateway Conveniently manage and schedule iDevices Wall Outlet from anywhere using the power of your voice via Siri®, Alexa and Google Assistant. iDevices - welcome to the evolution of your smart home.";
        $product2_2_2->category_id = $category2Id;
        $product2_2_2->subcategory_id = $subcategory2_2Id;
        $product2_2_2->brand_id = $brand2Id;
        $product2_2_2->amount_left = 56;
        $product2_2_2->price = 35000;
        $product2_2_2->attributes = ["DEV0010",
                                        "852931005667",
                                        "white",
                                        "Yes",
                                        "UV stabilized polycarbonate",
                                        "4.1 x 1.73 x 1.73",
                                        "120 grams"];
        $product2_2_2->save();

        // продукты категории 2 подкатегории 3
        $product2_3_1 = new Product();
        $product2_3_1->name = 'Insteon key change kit with custom engraving for Insteon keyboards';
        $product2_3_1->slug = 'insteon_key_change_kit';
        $product2_3_1->image_url = 'product11.jpg';
        $product2_3_1->description = "By labeling all six buttons on the Insteon Keyboard Dimmer Switch (sold separately), you can tell at a glance which lights or rooms each button controls. For maximum personalization, order custom keyboard buttons, laser-etched replacement buttons for Insteon keyboard dimmers and switches." ;
        $product2_3_1->category_id = $category2Id;
        $product2_3_1->subcategory_id = $subcategory2_3Id;
        $product2_3_1->brand_id = $brand1Id;
        $product2_3_1->amount_left = 87;
        $product2_3_1->price = 14900;
        $product2_3_1->attributes = ["813922010251", "white"];
        $product2_3_1->save();

        $product2_3_2 = new Product();
        $product2_3_2->name = 'Insteon Button Change Kit for Insteon 6-Button Keyboards';
        $product2_3_2->slug = 'insteon_button_change_kit';
        $product2_3_2->image_url = 'product12.jpg';
        $product2_3_2->description = "If you want to change the color of your keyboard, this color change kit comes with everything you need, including a frame and six buttons. These kits include elegant buttons to enhance the look of the original buttons and frames that come with keyboards. Darker colored buttons are almost opaque. ";
        $product2_3_2->category_id = $category2Id;
        $product2_3_2->subcategory_id = $subcategory2_3Id;
        $product2_3_2->brand_id = $brand1Id;
        $product2_3_2->amount_left = 87;
        $product2_3_2->price = 2450;
        $product2_3_2->attributes = ["718122387014", "white"];
        $product2_3_2->save();

        // продукты категории 3 подкатегории 1
        $product3_1_1 = new Product();
        $product3_1_1->name = 'Nest Thermostat E';
        $product3_1_1->slug = 'nest_e';
        $product3_1_1->image_url = 'product13.jpg';
        $product3_1_1->description = "Easy to save energy with the Nest thermostat. Matte display - blends in with the background and blends in with any home. Remote control - Use the Nest app to change the temperature anywhere - at the beach, in the office or in bed. Proven energy saving function - Just like a learning Nest Thermostat, Nest Thermostat E can help you save money from day one Home/Away Assist - Turns off after you leave so you don't waste energy heating or cooling an empty home Simple Schedule - Start with a basic schedule and then adjust it whenever you want.Energy History - Check the Nest app to see how much energy you're using and why.";
        $product3_1_1->category_id = $category3Id;
        $product3_1_1->subcategory_id = $subcategory3_1Id;
        $product3_1_1->brand_id = $brand2Id;
        $product3_1_1->amount_left = 87;
        $product3_1_1->price = 56990;
        $product3_1_1->attributes = ["T4000ES",
                                        "813917020593",
                                        "white",
                                        "24-bit color LCD display 320 x 320 resolution at 182 pixels per inch 1.76 (4.5 cm) diameter",
                                        "Temperature, Humidity, Proximity/Business, Ambient Light",
                                        "Wi-Fi connection with Internet access. Phone or tablet with iOS 8 or later, or Android 4 or later with a free Nest account",
                                        "English (US, UK), Russian, Dutch, French (Canada, France), Italian, Spanish (North America, Spain)",
                                        "Less than 1 kWh/month"];
        $product3_1_1->save();

        $product3_1_2 = new Product();
        $product3_1_2->name = 'Honeywell Wi-Fi Smart Color';
        $product3_1_2->slug = 'Honeywell_Wi-Fi_Smart_Color';
        $product3_1_2->image_url = 'product14.jpg';
        $product3_1_2->description = "The second generation of Honeywell RTH9585WF1004 Wi-Fi Smart Color Thermostat is designed for individual use. Custom scheduling will meet comfort needs while optimizing energy savings. Intelligent Response Learning eliminates programming guesswork, allowing Wi-Fi Smart Color Thermostat to learn preferred heating and cooling cycle times. This feature delivers the right temperature just when you need it. The inclusion of a customizable color touch display will prompt owners to create their own unique look when matched with their home's surrounding décor.";
        $product3_1_2->category_id = $category3Id;
        $product3_1_2->subcategory_id = $subcategory3_1Id;
        $product3_1_2->brand_id = $brand1Id;
        $product3_1_2->amount_left = 87;
        $product3_1_2->price = 56990;
        $product3_1_2->attributes = ["RTH9585WF1004",
                                        "085267911313",
                                        "white",
                                        "24-bit color LCD display 320 x 320 resolution at 182 pixels per inch 1.76 (4.5 cm) diameter",
                                        "Temperature, Humidity, Proximity/Business, Ambient Light",
                                        "Wi-Fi connection with Internet access. Phone or tablet with iOS 8 or later, or Android 4 or later with a free Nest account",
                                        "English (US, UK), Russian, Dutch, French (Canada, France), Italian, Spanish (North America, Spain)",
                                        "Less than 1 kWh/month"];
        $product3_1_2->save();

        // продукты категории 3 подкатегории 2
        $product3_2_1 = new Product();
        $product3_2_1->name = 'ecoVent';
        $product3_2_1->slug = 'ecoVent';
        $product3_2_1->image_url = 'product15.jpg';
        $product3_2_1->description = "Control the temperature in every single room in your home with the ecoVent Smart Ceiling Vents. The Smart Vent connects to the ecoVent Smart Hub and ecoVent Room Sensor (Smart Hub and Room Sensor sold separately). The vent is instructed by the Smart Hub to automatically open and block direct airflow between rooms, making each room the right temperature.Set a schedule to automatically adjust the temperature based on room occupancy and usage to maintain a comfortable home environment around the clock.";
        $product3_2_1->category_id = $category3Id;
        $product3_2_1->subcategory_id = $subcategory3_2Id;
        $product3_2_1->brand_id = $brand2Id;
        $product3_2_1->amount_left = 76;
        $product3_2_1->price = 56990;
        $product3_2_1->attributes = ["EV410C",
                                        "683318654709",
                                        "white",
                                        "Delrin PC-ABS polymer and polyoxymethylene",
                                        "All ducted forced air heating and/or cooling systems: Single stage/variable speed fans. Single stage, two stage and variable speed ovens. Split systems, packaged units and heat pumps. Thermostats. Emerson Sensi Thermostat sold by Ecovent Nest (1st and 2nd generation).The radio thermostat will work without thermostat control",
                                        "11.84 x 5.84 x 2.03"];
        $product3_2_1->save();

        $product3_2_2 = new Product();
        $product3_2_2->name = 'ecoVent Smart Hub';
        $product3_2_2->slug = 'ecoVent_Smart_Hub';
        $product3_2_2->image_url = 'product16.jpg';
        $product3_2_2->description = "ecoVent Smart Hub for connecting your ecoVent Smart Vent system. The Smart Hub communicates with ecoVent Smart vents and room sensors (both sold separately), as well as some smart thermostats, using WiFi and Zigbee networks. An Ethernet port connects the Smart Hub to your home internet -networked, allowing it to connect to ecoVent units and compatible smart thermostats.";
        $product3_2_2->category_id = $category3Id;
        $product3_2_2->subcategory_id = $subcategory3_2Id;
        $product3_2_2->brand_id = $brand2Id;
        $product3_2_2->amount_left = 76;
        $product3_2_2->price = 56990;
        $product3_2_2->attributes = ["EVHUB",
                                        "683318654648",
                                        "white",
                                        "Mainly PC-ABS polymer and polyoxymethylene",
                                        "Emerson Sensi thermostat from Ecovent Nest (1st and 2nd generation)",
                                        "5.09 x 1.44 x 5.48"];
        $product3_2_2->save();

        // продукты категории 3 подкатегории 3
        $product3_3_1 = new Product();
        $product3_3_1->name = 'ecobee3 remote control sensors with stand';
        $product3_3_1->slug = 'ecobee3_sensors';
        $product3_3_1->image_url = 'product17.jpg';
        $product3_3_1->description = "Specially designed to complement the ecobee3 Lite and ecobee4 thermostats, ecobee remote sensors read the temperature in the most important rooms, providing the right temperature in the right places. Conventional thermostats only read the temperature in one place. The ecobee Smart Wi-Fi thermostat can use multiple temperature readings from remote sensors (up to 32) for more reliable comfort Simply place the remote sensor at a height of about 5 feet in a high-traffic open area such as a living room, hallway, or other room, and after installing the ecobee Smart Wi-Fi Thermostat, it will automatically detect the remote sensor .";
        $product3_3_1->category_id = $category3Id;
        $product3_3_1->subcategory_id = $subcategory3_3Id;
        $product3_3_1->brand_id = $brand3Id;
        $product3_3_1->amount_left = 76;
        $product3_3_1->price = 26990;
        $product3_3_1->attributes = ["627988301129", "white"];
        $product3_3_1->save();

        $product3_3_2 = new Product();
        $product3_3_2->name = 'ecoVent Smart Room Sensor';
        $product3_3_2->slug = 'ecoVent_Smart_Room';
        $product3_3_2->image_url = 'product18.jpg';
        $product3_3_2->description = "The ecoVent Room Sensor monitors the temperature, humidity and air pressure in any room in your home. The room sensor works together with the ecoVent Smart Hub and Smart Vents (both sold separately) to monitor the temperature in individual rooms of your home. Controlling the temperature in a single room requires only one room sensor Plugs into a standard wall outlet and offers 2 loop-through outputs and 2 USB ports, giving you additional outputs when sending temperature data to the Smart Hub.";
        $product3_3_2->category_id = $category3Id;
        $product3_3_2->subcategory_id = $subcategory3_3Id;
        $product3_3_2->brand_id = $brand3Id;
        $product3_3_2->amount_left = 45;
        $product3_3_2->price = 38990;
        $product3_3_2->attributes = ["683318654617", "white"];
        $product3_3_2->save();

        // пользователь
        $user = new User();
        $user->name = 'Alexander Pushkin';
        $user->email = 'user@smartstore.com';
        $user->password = Hash::make('user');
        $user->save();
        $userId = User::whereEmail('user@smartstore.com')->first()->id;

        // корзина
        $cart = new Cart();
        $cart->status = '-';
        $cart->user_id = $userId;
        $cart->total_price = 0;
        $cart->save();

        // список желаний
        $wishlist = new Wishlist();
        $wishlist->status = '-';
        $wishlist->user_id = $userId;
        $wishlist->save();
    }
}
