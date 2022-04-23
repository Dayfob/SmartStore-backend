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
        $news1->slug = 'sdelai_svoi_vybor';
        $news1->title = 'Сделай свой выбор: Каскадные скидки или Кэшбэк до 20%';
        $news1->image_url = 'news1.png';
        $news1->text = 'Представляем наши суперакции: Кэшбэк до 20% и Каскадные скидки от 20 до 70%.
                        С 7 апреля по 2 мая включительно ты решаешь, что выгодно и получаешь купон на скидку 30% на следующую покупку при любом раскладе.
                        Твой выбор будет верным - осталось только его сделать.';
        $news1->user_id = $employerId;
        $news1->save();

        $news2 = new News();
        $news2->slug = 'what_is_insteon';
        $news2->title = 'What is Insteon?';
        $news2->image_url = 'news2.png';
        $news2->text = 'Insteon labels itself the most-reliable home automation technology using both existing wires (power line) and radio frequency communication. They add smart home technology to lighting, appliances, and much more.
                        Remote Control - Switches can be remotely controlled from almost any device in your home: Sensors monitoring doors, windows, leaks and more, remotes, keypads and other wall switches throughout your home, even your smartphone when used with the Insteon Hub.';
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
        $category1->name = 'Камеры';
        $category1->slug = 'camery';
        $category1->description = 'Это камеры.';
        $category1->save();
        $category1Id = ProductCategory::whereSlug('camery')->first()->id;

        $category2 = new ProductCategory();
        $category2->name = 'Освещение';
        $category2->slug = 'osveshenie';
        $category2->description = 'Это устройства для освещения.';
        $category2->save();
        $category2Id = ProductCategory::whereSlug('osveshenie')->first()->id;

        $category3 = new ProductCategory();
        $category3->name = 'Температура';
        $category3->slug = 'temperatura';
        $category3->description = 'Это устройства для регулировки температуры.';
        $category3->save();
        $category3Id = ProductCategory::whereSlug('temperatura')->first()->id;

        // подкатегории категории 1
        $subcategory1_1 = new ProductSubcategory();
        $subcategory1_1->category_id = $category1Id;
        $subcategory1_1->name = 'Наблюдение';
        $subcategory1_1->slug = 'camery_nabludenie';
        $subcategory1_1->description = 'Это устройства для наблюдения.';
        $subcategory1_1->attributes = '{"attributes": ["Номер продукта",
                                                        "UPC",
                                                        "Камера",
                                                        "Разрешение",
                                                        "Формат видео",
                                                        "Батарея",
                                                        "Расчетный срок службы батареи",
                                                        "Подключение",
                                                        "Расстояние обнаружения",
                                                        "Размер (В x Ш x Г)",
                                                        "Вес"]}';
        $subcategory1_1->save();
        $subcategory1_1Id = ProductSubcategory::whereSlug('camery_nabludenie')->first()->id;

        $subcategory1_2 = new ProductSubcategory();
        $subcategory1_2->category_id = $category1Id;
        $subcategory1_2->name = 'Дверные звоноки';
        $subcategory1_2->slug = 'camery_dvernie_zvonki';
        $subcategory1_2->description = 'Это дверные звонки.';
        $subcategory1_2->attributes = '{"attributes": ["Номер продукта",
                                                        "UPC",
                                                        "Требования",
                                                        "Стандарты",
                                                        "Питание",
                                                        "Размер (В x Ш x Г)",
                                                        "Вес"]}';
        $subcategory1_2->save();
        $subcategory1_2Id = ProductSubcategory::whereSlug('camery_dvernie_zvonki')->first()->id;

        $subcategory1_3 = new ProductSubcategory();
        $subcategory1_3->category_id = $category1Id;
        $subcategory1_3->name = 'Аксессуары';
        $subcategory1_3->slug = 'camery_aksessuary';
        $subcategory1_3->description = 'Это аксессуары.';
        $subcategory1_3->attributes = '{"attributes": ["UPC", "Цвет"]}';
        $subcategory1_3->save();
        $subcategory1_3Id = ProductSubcategory::whereSlug('camery_aksessuary')->first()->id;

        // подкатегории категории 2
        $subcategory2_1 = new ProductSubcategory();
        $subcategory2_1->category_id = $category2Id;
        $subcategory2_1->name = 'Лампочки';
        $subcategory2_1->slug = 'osveshenie_lampochki';
        $subcategory2_1->description = 'Это лапочки.';
        $subcategory2_1->attributes = '{"attributes": ["Номер продукта", "UPC", "Цвет", "Яркость", "Продолжительность работы",
                                                        "Цоколь", "Мощность"]}';
        $subcategory2_1->save();
        $subcategory2_1Id = ProductSubcategory::whereSlug('osveshenie_lampochki')->first()->id;

        $subcategory2_2 = new ProductSubcategory();
        $subcategory2_2->category_id = $category2Id;
        $subcategory2_2->name = 'Розетки';
        $subcategory2_2->slug = 'osveshenie_rozetki';
        $subcategory2_2->description = 'Это розетки.';
        $subcategory2_2->attributes = '{"attributes": ["Номер продукта", "UPC", "Цвет", "Программное обеспечение",
                                                        "Материал", "Размер (В x Ш x Г)", "Вес"]}';
        $subcategory2_2->save();
        $subcategory2_2Id = ProductSubcategory::whereSlug('osveshenie_rozetki')->first()->id;

        $subcategory2_3 = new ProductSubcategory();
        $subcategory2_3->category_id = $category2Id;
        $subcategory2_3->name = 'Аксессуары';
        $subcategory2_3->slug = 'osveshenie_aksessuary';
        $subcategory2_3->description = 'Это аксессуары.';
        $subcategory2_3->attributes = '{"attributes": ["UPC", "Цвет"]}';
        $subcategory2_3->save();
        $subcategory2_3Id = ProductSubcategory::whereSlug('osveshenie_aksessuary')->first()->id;

        // подкатегории категории 3
        $subcategory3_1 = new ProductSubcategory();
        $subcategory3_1->category_id = $category3Id;
        $subcategory3_1->name = 'Термостаты';
        $subcategory3_1->slug = 'temperatura_termostat';
        $subcategory3_1->description = 'Это термостаты.';
        $subcategory3_1->attributes = '{"attributes": ["Номер продукта", "UPC", "Цвет", "Дисплей", "Сенсоры",
                                                        "Способ подключения", "Языки", "Потребление"]}';
        $subcategory3_1->save();
        $subcategory3_1Id = ProductSubcategory::whereSlug('temperatura_termostat')->first()->id;

        $subcategory3_2 = new ProductSubcategory();
        $subcategory3_2->category_id = $category3Id;
        $subcategory3_2->name = 'Вентиляционные отверстия';
        $subcategory3_2->slug = 'temperatura_ventelyazia';
        $subcategory3_2->description = 'Это вентиляционные отверстия.';
        $subcategory3_2->attributes = '{"attributes": ["Номер продукта", "UPC", "Цвет", "Материал",
                                                        "Совместимость", "Размер (В x Ш x Г)"]}';
        $subcategory3_2->save();
        $subcategory3_2Id = ProductSubcategory::whereSlug('temperatura_ventelyazia')->first()->id;

        $subcategory3_3 = new ProductSubcategory();
        $subcategory3_3->category_id = $category3Id;
        $subcategory3_3->name = 'Аксессуары';
        $subcategory3_3->slug = 'temperatura_aksessuary';
        $subcategory3_3->description = 'Это аксессуары.';
        $subcategory3_3->attributes = '{"attributes": ["UPC", "Цвет"]}';
        $subcategory3_3->save();
        $subcategory3_3Id = ProductSubcategory::whereSlug('temperatura_aksessuary')->first()->id;

        // бренды
        $brand1 = new ProductBrand();
        $brand1->name = 'Honeywell';
        $brand1->slug = 'honeywell';
        $brand1->description = 'Это Honeywell.';
        $brand1->save();
        $brand1Id = ProductBrand::whereSlug('honeywell')->first()->id;

        $brand2 = new ProductBrand();
        $brand2->name = 'Google';
        $brand2->slug = 'google';
        $brand2->description = 'Это Google.';
        $brand2->save();
        $brand2Id = ProductBrand::whereSlug('google')->first()->id;

        $brand3 = new ProductBrand();
        $brand3->name = 'Johnson Controls';
        $brand3->slug = 'johnson_controls';
        $brand3->description = 'Это Johnson Controls.';
        $brand3->save();
        $brand3Id = ProductBrand::whereSlug('johnson_controls')->first()->id;

        // продукты категории 1 подкатегории 1
        $product1_1_1 = new Product();
        $product1_1_1->name = 'Система наблюдения за движением в помещении Honeywell Smart Home Security';
        $product1_1_1->slug = 'honeywell_smart_home_security';
        $product1_1_1->image_url = 'product1.jpg';
        $product1_1_1->description =
            'Расширьте свою систему, чтобы вы могли следить за большим количеством комнат в доме
            Возьмите осведомленность на открытом воздухе с дальним обнаружением до 23 футов (7 м) и полем зрения 90 градусов
            Ночное видение означает, что он находится на часах круглосуточно, с батареей 2 года (срок службы батареи зависит от типичного использования.)
            Небольшое животное (до 79 фунтов.) не вызовет ложных тревог, поэтому не беспокойтесь о том, что ваш питомец вызовет систему';
        $product1_1_1->category_id = $category1Id;
        $product1_1_1->subcategory_id = $subcategory1_1Id;
        $product1_1_1->brand_id = $brand1Id;
        $product1_1_1->amount_left = 100;
        $product1_1_1->price = 60990;
        $product1_1_1->attributes = '{"attributes": ["RCHSIMV1/W",
                                                        "085267439022",
                                                        "90 поле зрения",
                                                        "QVGA (320x240)",
                                                        "10 секунд цветного видео clipH.264 @ 10 кадров в секунду",
                                                        "Литий 3 CR123A",
                                                        "До 2 лет на основе типичного использования",
                                                        "Протокол Honeywell Secure Wiselink",
                                                        "До 7 метров",
                                                        "125,7 x 50,8 x 46,2 мм",
                                                        "С раздвижной пластиной 165 г
                                                        С настольным креплением 180 г"]}';
        $product1_1_1->save();

        $product1_1_2 = new Product();
        $product1_1_2->name = 'Blink Mini — компактная смарт-камера безопасности для помещений';
        $product1_1_2->slug = 'blink_mini';
        $product1_1_2->image_url = 'product2.jpg';
        $product1_1_2->description = 'Смотрите, что происходит в прямом эфире в HD-видео в любое время – днем или ночью
                                        1080P HD indoor, plug-in security camera с обнаружением движения и двухсторонним звуком, который позволяет контролировать внутреннюю часть вашего дома днем и ночью.
                                        Получайте оповещения на свой смартфон при обнаружении движения или настраивайте зоны обнаружения движения, чтобы вы могли видеть, что важнее всего.
                                        Смотрите, слышите и говорите с людьми и домашними животными в вашем доме на вашем смартфоне с функциями Live View и двухстороннего аудио Blink Mini (live view не является непрерывным).
                                        Настройка за считанные минуты – просто подключите камеру, подключите ее к Wi-Fi и добавьте в приложение Blink.
                                        Blink Mini включает бесплатную пробную версию подписки на облачное хранилище Blink до 31 декабря 2020 года.
                                        Для дополнительной простоты использования соедините Blink Mini с поддерживаемым устройством с поддержкой Alexa для просмотра в реальном времени, просмотра записанных видео, а также постановки и снятия с охраны, используя только ваш голос.';
        $product1_1_2->category_id = $category1Id;
        $product1_1_2->subcategory_id = $subcategory1_1Id;
        $product1_1_2->brand_id = $brand3Id;
        $product1_1_2->amount_left = 100;
        $product1_1_2->price = 15990;
        $product1_1_2->attributes = '{"attributes": ["-",
                                                    "-",
                                                    "110 поле зрения",
                                                    "Запись и просмотр в 1080p HD видео в течение дня и с инфракрасным HD ночным видением после наступления темноты",
                                                    "10 секунд цветного видео clipH.264 @ 10 кадров в секунду",
                                                    "Литий 3 CR123A", "До 2 лет на основе типичного использования",
                                                    "Поддерживает 2,4 ГГц 802.11 g/n; не поддерживает подключение к специальным (или одноранговым) или платным WiFi-сетям. Требуется минимальная скорость загрузки 2 Мбит/с.",
                                                    "До 7 метров", "125,7 x 50,8 x 46,2 мм",
                                                    "С раздвижной пластиной 165 г
                                                    С настольным креплением 180 г"]}';
        $product1_1_2->save();

        // продукты категории 1 подкатегории 2
        $product1_2_1 = new Product();
        $product1_2_1->name = 'Август дверной звонок Cam Pro';
        $product1_2_1->slug = 'august_cam_pro';
        $product1_2_1->image_url = 'product3.jpg';
        $product1_2_1->description =
            'August Doorbell Cam Pro
            Посмотрите, кто находится у двери, когда вас нет дома. Встроенный прожектор обеспечивает полноцветное HD-видео даже в темноте.
            Смотрите и говорите с посетителями
            Приветствуйте друзей и семью с двухсторонним звуком или скажите нежелательным посетителям уйти.
            Полноцветный HD ночью
            Посмотрите, что происходит снаружи - даже в темноте.
            Всегда фиксируйте то, что важно
            Активированный движением August HindSight™ захватывает кадры, которые показывают вам всю историю с момента приближения человека к тому, когда он уходит.';
        $product1_2_1->category_id = $category1Id;
        $product1_2_1->subcategory_id = $subcategory1_2Id;
        $product1_2_1->brand_id = $brand1Id;
        $product1_2_1->amount_left = 100;
        $product1_2_1->price = 50990;
        $product1_2_1->attributes = '{"attributes": ["AUG-AB02-M02-S02",
                                                        "853984006250",
                                                        "Существующий проводной дверной
                                                        звонок 12-24VAC Проводной силовой
                                                        механический дверной звонок
                                                        Wi-Fi® Подключение к Интернету
                                                        (802.11 b/g/n 2,4 ГГц или 5 ГГц)
                                                        Bluetooth-готовый смартфон
                                                        Бесплатное приложение August для iOS или Android",
                                                        "Спецификация Bluetooth v4.0 (Bluetooth Smart), 5 ГГц, 2,4 ГГц 80211(B/G/N)",
                                                        "Проводная мощность 12-24VAC",
                                                        "2.9 x 0.9 x 2.9",
                                                        "0,25 фунта"]}';
        $product1_2_1->save();

        $product1_2_2 = new Product();
        $product1_2_2->name = 'Ring видео дверной звонок Pro';
        $product1_2_2->slug = 'ring_pro';
        $product1_2_2->image_url = 'product4.jpg';
        $product1_2_2->description =
            'Описание продукта
            С помощью Ring Doorbell Pro вы можете увидеть, кто находится у вашей двери в самом высоком качестве видео. Он подключается к вашей домашней сети Wi-Fi и отправляет уведомления на ваш смартфон или планшет, когда обнаруживает движение у вашей входной двери. Бесплатное приложение Ring доступно для устройств Apple, Android и Windows 10.';
        $product1_2_2->category_id = $category1Id;
        $product1_2_2->subcategory_id = $subcategory1_2Id;
        $product1_2_2->brand_id = $brand3Id;
        $product1_2_2->amount_left = 87;
        $product1_2_2->price = 90490;
        $product1_2_2->attributes = '{"attributes": ["8VR1P6-0EN0",
                                                        "852239005208",
                                                        "Существующий проводной дверной
                                                        звонок 12-24VAC Проводной силовой
                                                        механический дверной звонок
                                                        Wi-Fi® Подключение к Интернету
                                                        (802.11 b/g/n 2,4 ГГц или 5 ГГц)
                                                        Bluetooth-готовый смартфон
                                                        Бесплатное приложение August для iOS или Android",
                                                        "Спецификация Bluetooth v4.0 (Bluetooth Smart), 5 ГГц, 2,4 ГГц 80211(B/G/N)",
                                                        "Проводная мощность 12-24VAC",
                                                        "4.50 x 1.85 x .80",
                                                        "0,25 фунта"]}';
        $product1_2_2->save();

        // продукты категории 1 подкатегории 3
        $product1_3_1 = new Product();
        $product1_3_1->name = 'Традиционный светильник-компаньон для крыльца Maximus Smart Light';
        $product1_3_1->slug = 'maximus_smart_light';
        $product1_3_1->image_url = 'product5.jpg';
        $product1_3_1->description =
            'Красивый и низкий вариант обслуживания для защиты того, что имеет значение
Bluetooth включен для легкого сопряжения с существующим интеллектуальным светом безопасности
Работает с Amazon Alexa и Google Assistant
Автоматическая настройка освещения. включение/выключение синхронно с maximus smart security light, включение через движение и многое другое
Литой алюминиевый светильник с матовой стеклянной крышкой, устойчивый к атмосферным воздействиям
Простая установка. Замените существующий светильник новым, дополнительная проводка не требуется.';
        $product1_3_1->category_id = $category1Id;
        $product1_3_1->subcategory_id = $subcategory1_3Id;
        $product1_3_1->brand_id = $brand3Id;
        $product1_3_1->amount_left = 25;
        $product1_3_1->price = 29900;
        $product1_3_1->attributes = '{"attributes": ["853984006250", "Черный"]}';
        $product1_3_1->save();

        $product1_3_2 = new Product();
        $product1_3_2->name = 'Светильник-компаньон для крыльца Maximus Smart Contemporary';
        $product1_3_2->slug = 'maximus_smart_contemporary';
        $product1_3_2->image_url = 'product5.jpg';
        $product1_3_2->description =
            'Красивый и низкий вариант обслуживания для защиты того, что имеет значение
Bluetooth включен для легкого сопряжения с существующим интеллектуальным светом безопасности
Работает с Amazon Alexa и Google Assistant
Автоматическая настройка освещения. включение/выключение синхронно с maximus smart security light, включение через движение и многое другое
Литой алюминиевый светильник с матовой стеклянной крышкой, устойчивый к атмосферным воздействиям
Простая установка. Замените существующий светильник новым, дополнительная проводка не требуется.';
        $product1_3_2->category_id = $category1Id;
        $product1_3_2->subcategory_id = $subcategory1_3Id;
        $product1_3_2->brand_id = $brand3Id;
        $product1_3_2->amount_left = 25;
        $product1_3_2->price = 29900;
        $product1_3_2->attributes = '{"attributes": ["853984006320", "Черный"]}';
        $product1_3_2->save();

        // продукты категории 2 подкатегории 1
        $product2_1_1 = new Product();
        $product2_1_1->name = 'Sengled Zigbee Dimmable Smart LED';
        $product2_1_1->slug = 'sengled_zigbee';
        $product2_1_1->image_url = 'product7.jpg';
        $product2_1_1->description =
            'Сцены
            Управляйте группами огней в сценах, чтобы мгновенно установить тон для любого события.
            Световые графики
            Запрограммируйте свои умные огни на включение или выключение в нужное вам время, яркость, цвет и многое другое.';
        $product2_1_1->category_id = $category2Id;
        $product2_1_1->subcategory_id = $subcategory2_1Id;
        $product2_1_1->brand_id = $brand1Id;
        $product2_1_1->amount_left = 87;
        $product2_1_1->price = 4490;
        $product2_1_1->attributes = '{"attributes": ["E11-G13",
                                                        "852239005208",
                                                        "мягкий белый",
                                                        "Регулируемая до 800 люмен",
                                                        "25 000 часов",
                                                        "E26",
                                                        "9 Вт"]}';
        $product2_1_1->save();

        $product2_1_2 = new Product();
        $product2_1_2->name = 'Ring A19 Smart LED Bulb';
        $product2_1_2->slug = 'ring_a19';
        $product2_1_2->image_url = 'product8.jpg';
        $product2_1_2->description =
            'Горит в любое время и в любом месте
            Добавьте Ring Smart Lighting в любую область вашего дома и управляйте ими из приложения Ring. Включите или выключите свет, пока вас нет, установите расписание и даже свяжите свои огни с совместимыми кольцевыми видео дверными звонками и камерами, чтобы увидеть, что происходит, когда ваши огни обнаруживают движение.
            Управляйте своими огнями из любого места
            Умная светодиодная лампа A19 позволяет размещать умное освещение в любом месте, где вам это нужно внутри или в крытых наружных светильниках. В паре с кольцевым мостом (входит в стартовые комплекты или продается отдельно) вы можете устанавливать расписание и включать и выключать свет удаленно через приложение Ring.';
        $product2_1_2->category_id = $category2Id;
        $product2_1_2->subcategory_id = $subcategory2_1Id;
        $product2_1_2->brand_id = $brand2Id;
        $product2_1_2->amount_left = 87;
        $product2_1_2->price = 8490;
        $product2_1_2->attributes = '{"attributes": ["E11-G13",
                                                        "852239005208",
                                                        "мягкий белый",
                                                        "Регулируемая до 800 люмен",
                                                        "25 000 часов",
                                                        "E26",
                                                        "9 Вт"]}';
        $product2_1_2->save();

        // продукты категории 2 подкатегории 2
        $product2_2_1 = new Product();
        $product2_2_1->name = 'Диммерная розетка с дистанционным управлением Insteon';
        $product2_2_1->slug = 'insteon_rozetka';
        $product2_2_1->image_url = 'product9.jpg';
        $product2_2_1->description =
            'Первая в мире дистанционно управляемая диммируемая розетка!
Элегантный, встроенный, чистый и профессиональный внешний вид для дистанционного управления лампами
Одна дистанционно управляемая розетка и одна стандартная (всегда включенная) розетка
Устойчивый к вскрытию механизм затвора для защиты от неправильного ввода объекта и поражения электрическим током
Управляемая розетка поддерживает "load sense" - ручное включение нагрузки (при нагрузке) включит розетку
Работает как с Amazon Alexa, так и с Google Assistant для голосового управления (требуется концентратор Insteon, устройство Alexa и устройство Google Assistant продаются отдельно)';
        $product2_2_1->category_id = $category2Id;
        $product2_2_1->subcategory_id = $subcategory2_2Id;
        $product2_2_1->brand_id = $brand3Id;
        $product2_2_1->amount_left = 87;
        $product2_2_1->price = 23500;
        $product2_2_1->attributes = '{"attributes": ["2472DWH",
                                                        "813922010251",
                                                        "белый",
                                                        "да",
                                                        "УФ-стабилизированный поликарбонат",
                                                        "4.1 x 1.73 x 1.73",
                                                        "120 грамм"]}';
        $product2_2_1->save();

        $product2_2_2 = new Product();
        $product2_2_2->name = 'Настенная розетка iDevices Smart WiFi';
        $product2_2_2->slug = 'iDevices_smart_WiFi';
        $product2_2_2->image_url = 'product10.jpg';
        $product2_2_2->description =
            'Настенная розетка с двойным управлением Wi-Fi
Поднимите свой умный дом на новый уровень с помощью iDevices Wall Outlet - единственной встроенной розетки с поддержкой Wi-Fi®, совместимой с HomeKit™, Alexa и Google Assistant. Благодаря интеллектуальным функциям, таким как индивидуальное управление розеткой и мониторинг энергии, iDevices Wall Outlet обеспечивает мощную функциональность в любом месте вашего дома без необходимости центрального концентратора или шлюза. Удобно управлять и планировать iDevices Wall Outlet из любого места, используя силу вашего голоса через Siri®, Alexa и Google Assistant. Настенная розетка iDevices - добро пожаловать в эволюцию вашего умного дома.';
        $product2_2_2->category_id = $category2Id;
        $product2_2_2->subcategory_id = $subcategory2_2Id;
        $product2_2_2->brand_id = $brand2Id;
        $product2_2_2->amount_left = 56;
        $product2_2_2->price = 35000;
        $product2_2_2->attributes = '{"attributes": ["DEV0010",
                                                        "852931005667",
                                                        "белый",
                                                        "да",
                                                        "УФ-стабилизированный поликарбонат",
                                                        "4.1 x 1.73 x 1.73",
                                                        "120 грамм"]}';
        $product2_2_2->save();

        // продукты категории 2 подкатегории 3
        $product2_3_1 = new Product();
        $product2_3_1->name = 'Комплект для смены кнопок Insteon с индивидуальной гравировкой для клавиатур Insteon';
        $product2_3_1->slug = 'insteon_komplekt_knopok';
        $product2_3_1->image_url = 'product11.jpg';
        $product2_3_1->description =
            'Обозначив все шесть кнопок на переключателе диммера клавиатуры Insteon (продается отдельно), вы сможете с первого взгляда определить, какие огни или комнаты контролирует каждая кнопка. Для максимальной персонализации закажите пользовательские кнопки клавиатуры, вытравленные лазером кнопки замены для диммеров и переключателей клавиатуры Insteon';
        $product2_3_1->category_id = $category2Id;
        $product2_3_1->subcategory_id = $subcategory2_3Id;
        $product2_3_1->brand_id = $brand1Id;
        $product2_3_1->amount_left = 87;
        $product2_3_1->price = 14900;
        $product2_3_1->attributes = '{"attributes": ["813922010251", "белый"]}';
        $product2_3_1->save();

        $product2_3_2 = new Product();
        $product2_3_2->name = 'Insteon Button Change Kit для 6-кнопочных клавиатур Insteon';
        $product2_3_2->slug = 'insteon_komplekt_knopok_6';
        $product2_3_2->image_url = 'product12.jpg';
        $product2_3_2->description =
            'Если вы хотите изменить цвет клавиатуры, этот набор для изменения цвета поставляется со всем необходимым, включая рамку и шесть кнопок.
Эти наборы включают элегантные кнопки для улучшения внешнего вида оригинальных кнопок и рамок, которые поставляются с клавиатурами. Более темные цветные кнопки практически непрозрачны.';
        $product2_3_2->category_id = $category2Id;
        $product2_3_2->subcategory_id = $subcategory2_3Id;
        $product2_3_2->brand_id = $brand1Id;
        $product2_3_2->amount_left = 87;
        $product2_3_2->price = 2450;
        $product2_3_2->attributes = '{"attributes": ["718122387014", "белый"]}';
        $product2_3_2->save();

        // продукты категории 3 подкатегории 1
        $product3_1_1 = new Product();
        $product3_1_1->name = 'Nest Термостат E';
        $product3_1_1->slug = 'nest_e';
        $product3_1_1->image_url = 'product13.jpg';
        $product3_1_1->description =
            'С помощью термостата Nest легко экономить энергию.
Матовый дисплей - сливается с фоном и вписывается в любой дом.
Дистанционное управление - Используйте приложение Nest для изменения температуры в любом месте – на пляже, в офисе или в постели.
Проверенная функция энергосбережения - Как и обучающий термостат Nest, термостат Nest E может помочь вам экономить с самого первого дня.
Home/Away Assist - выключается после того, как вы уйдете, поэтому вы не тратите энергию на отопление или охлаждение пустого дома.
Простое расписание - начните с базового расписания, а затем корректируйте его, когда захотите.
Энергетическая история - Проверьте приложение Nest, чтобы узнать, сколько энергии вы используете и почему.';
        $product3_1_1->category_id = $category3Id;
        $product3_1_1->subcategory_id = $subcategory3_1Id;
        $product3_1_1->brand_id = $brand2Id;
        $product3_1_1->amount_left = 87;
        $product3_1_1->price = 56990;
        $product3_1_1->attributes = '{"attributes": ["T4000ES",
                                                        "813917020593",
                                                        "белый",
                                                        "24-бит цветной ЖК-дисплей 320 x 320 разрешение на 182 пикселей на дюйм 1,76 дюйма (4,5 см) диаметр",
                                                        "Температура, Влажность, Близость/Занятость, Окружающий свет",
                                                        "Wi-Fi подключение с доступом в Интернет. Телефон или планшет с iOS 8 или более поздней версией, или Android 4 или поздней бесплатной учетной записью Nest",
                                                        "Английский (США, Великобритания), русский, голландский, французский (Канада, Франция), итальянский, испанский (Северная Америка, Испания)",
                                                        "Менее 1 кВтч/месяц"]}';
        $product3_1_1->save();

        $product3_1_2 = new Product();
        $product3_1_2->name = 'Honeywell Wi-Fi Smart Color';
        $product3_1_2->slug = 'Honeywell_Wi-Fi_Smart_Color';
        $product3_1_2->image_url = 'product14.jpg';
        $product3_1_2->description =
            'Второе поколение Honeywell RTH9585WF1004 Wi-Fi Smart Color Thermostat разработано для индивидуального использования. Создание пользовательского расписания удовлетворит потребности в комфорте при оптимизации экономии энергии. Интеллектуальное обучение ответу устраняет догадки о программировании, позволяя Wi-Fi Smart Color Thermostat изучать предпочтительные времена цикла нагрева и охлаждения. Эта функция обеспечивает правильную температуру именно тогда, когда это необходимо. Включение настраиваемого цветного сенсорного дисплея предложит владельцам создать свой собственный уникальный внешний вид при сопоставлении с окружающим декором своего дома.';
        $product3_1_2->category_id = $category3Id;
        $product3_1_2->subcategory_id = $subcategory3_1Id;
        $product3_1_2->brand_id = $brand1Id;
        $product3_1_2->amount_left = 87;
        $product3_1_2->price = 56990;
        $product3_1_2->attributes = '{"attributes": ["RTH9585WF1004",
                                                        "085267911313",
                                                        "белый",
                                                        "24-бит цветной ЖК-дисплей 320 x 320 разрешение на 182 пикселей на дюйм 1,76 дюйма (4,5 см) диаметр",
                                                        "Температура, Влажность, Близость/Занятость, Окружающий свет",
                                                        "Wi-Fi подключение с доступом в Интернет. Телефон или планшет с iOS 8 или более поздней версией, или Android 4 или поздней бесплатной учетной записью Nest",
                                                        "Английский (США, Великобритания), русский, голландский, французский (Канада, Франция), итальянский, испанский (Северная Америка, Испания)",
                                                        "Менее 1 кВтч/месяц"]}';
        $product3_1_2->save();

        // продукты категории 3 подкатегории 2
        $product3_2_1 = new Product();
        $product3_2_1->name = 'ecoVent';
        $product3_2_1->slug = 'ecoVent';
        $product3_2_1->image_url = 'product15.jpg';
        $product3_2_1->description =
            'Контролируйте температуру в каждой отдельной комнате в вашем доме с помощью ecoVent Smart Ceiling Vents. Smart Vent подключается к ecoVent Smart Hub и ecoVent Room Sensor (Smart Hub и Room Sensor продаются отдельно). Вентиляционное отверстие получает инструкции от Smart Hub, чтобы автоматически открывать и закрывать прямой поток воздуха между комнатами, делая каждую комнату правильной температурой. Установите расписание для автоматической регулировки температуры в зависимости от занятости и использования комнаты, чтобы поддерживать комфортную домашнюю обстановку круглосуточно.';
        $product3_2_1->category_id = $category3Id;
        $product3_2_1->subcategory_id = $subcategory3_2Id;
        $product3_2_1->brand_id = $brand2Id;
        $product3_2_1->amount_left = 76;
        $product3_2_1->price = 56990;
        $product3_2_1->attributes = '{"attributes": ["EV410C",
                                                        "683318654709",
                                                        "белый",
                                                        "Delrin PC-ABS полимер и полиоксиметилен",
                                                        "Все канальные системы принудительного воздушного отопления и/или охлаждения: Одноступенчатые/переменноскоростные вентиляторы. Одноступенчатые, двухступенчатые и переменноскоростные печи. Сплит-системы, упакованные блоки и тепловые насосы. Термостаты. Emerson Sensi Термостат продается Ecovent Nest (1-го и 2-го поколения). Радио термостат будет работать без управления термостатом",
                                                        "11.84 x 5.84 x 2.03"]}';
        $product3_2_1->save();

        $product3_2_2 = new Product();
        $product3_2_2->name = 'ecoVent Smart Hub';
        $product3_2_2->slug = 'ecoVent_Smart_Hub';
        $product3_2_2->image_url = 'product16.jpg';
        $product3_2_2->description =
            'ecoVent Smart Hub для подключения вашей системы ecoVent Smart Vent. Smart Hub взаимодействует с вентиляционными отверстиями ecoVent Smart и комнатными датчиками (оба продаются отдельно), а также с некоторыми интеллектуальными термостатами, используя сети WiFi и Zigbee. Порт Ethernet соединяет Smart Hub с домашней интернет-сетью, позволяя ему подключаться к устройствам ecoVent и совместимым интеллектуальным термостатам.';
        $product3_2_2->category_id = $category3Id;
        $product3_2_2->subcategory_id = $subcategory3_2Id;
        $product3_2_2->brand_id = $brand2Id;
        $product3_2_2->amount_left = 76;
        $product3_2_2->price = 56990;
        $product3_2_2->attributes = '{"attributes": ["EVHUB",
                                                        "683318654648",
                                                        "белый",
                                                        "Главным образом полимер PC-ABS и полиоксиметилен",
                                                        "Термостат Emerson Sensi от Ecovent Nest (1-го и 2-го поколения)",
                                                        "5.09 x 1.44 x 5.48"]}';
        $product3_2_2->save();

        // продукты категории 3 подкатегории 3
        $product3_3_1 = new Product();
        $product3_3_1->name = 'Датчики дистанционного управления ecobee3 с подставкой';
        $product3_3_1->slug = 'ecobee3_datchik';
        $product3_3_1->image_url = 'product17.jpg';
        $product3_3_1->description =
            'Специально разработанные в дополнение к термостату ecobee3 Lite и ecobee4, дистанционные датчики ecobee считывают температуру в наиболее важных помещениях, обеспечивая правильную температуру в нужных местах. Обычные термостаты считывают температуру только в одном месте. Термостат ecobee Smart Wi-Fi может использовать несколько показаний температуры от удаленных датчиков (до 32) для более надежного обеспечения комфорта. Просто поместите удаленный датчик на высоте около 5 футов в открытой зоне с интенсивным движением, такой как гостиная, прихожая или другая комната, и после установки ecobee Smart Wi-Fi Thermostat автоматически обнаружит удаленный датчик.';
        $product3_3_1->category_id = $category3Id;
        $product3_3_1->subcategory_id = $subcategory3_3Id;
        $product3_3_1->brand_id = $brand3Id;
        $product3_3_1->amount_left = 76;
        $product3_3_1->price = 26990;
        $product3_3_1->attributes = '{"attributes": ["627988301129", "белый"]}';
        $product3_3_1->save();

        $product3_3_2 = new Product();
        $product3_3_2->name = 'ecoVent Smart Room Датчик';
        $product3_3_2->slug = 'ecoVent_Smart_Room';
        $product3_3_2->image_url = 'product18.jpg';
        $product3_3_2->description =
            'Комнатный датчик ecoVent контролирует температуру, влажность и давление воздуха в любой комнате вашего дома. Комнатный датчик работает вместе с ecoVent Smart Hub и Smart Vents (оба продаются отдельно) для контроля температуры в отдельных комнатах вашего дома. Для контроля температуры в отдельной комнате требуется только один комнатный датчик. Датчик подключается к стандартной настенной розетке и предлагает 2 сквозных выхода и 2 порта USB, предоставляя вам дополнительные выходы при отправке данных о температуре в Smart Hub.';
        $product3_3_2->category_id = $category3Id;
        $product3_3_2->subcategory_id = $subcategory3_3Id;
        $product3_3_2->brand_id = $brand3Id;
        $product3_3_2->amount_left = 45;
        $product3_3_2->price = 38990;
        $product3_3_2->attributes = '{"attributes": ["683318654617", "белый"]}';
        $product3_3_2->save();

        // пользователь
        $user = new User();
        $user->name = 'Александр Пушкин';
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
