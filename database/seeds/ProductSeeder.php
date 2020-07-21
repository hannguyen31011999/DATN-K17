<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product')->insert([
            [
                'type_product_id'=> 5,'product_name'=>'Bánh Crepe Sầu riêng' ,'description'=>'Bánh crepe sầu riêng nhà làm' ,'unit_price'=> 150000,'promotion_price'=> 120000,'image'=>'1430967449-pancake-sau-rieng-6.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-10-26 03:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //1
            [
                'type_product_id'=> 5,'product_name'=>'Bánh Crepe Chocolate' ,'description'=>'' ,'unit_price'=> 180000,'promotion_price'=> 160000,'image'=>'crepe-chocolate.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-10-26 03:00:16' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //2
            [
                'type_product_id'=> 5,'product_name'=>'Bánh Crepe Sầu riêng - Chuối' ,'description'=>'' ,'unit_price'=> 150000,'promotion_price'=> 120000,'image'=>'crepe-chuoi.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-10-26 03:00:16' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //3
            [
                'type_product_id'=> 5,'product_name'=>'Bánh Crepe Đào' ,'description'=>'' ,'unit_price'=> 160000,'promotion_price'=> 0,'image'=>'crepe-dao.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-10-26 03:00:16' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //4
            [
                'type_product_id'=> 5,'product_name'=>'Bánh Crepe Dâu' ,'description'=>'' ,'unit_price'=> 160000,'promotion_price'=> 0,'image'=>'crepedau.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-10-26 03:00:16' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //5
            [
                'type_product_id'=> 5,'product_name'=>'Bánh Crepe Pháp' ,'description'=>'' ,'unit_price'=> 200000,'promotion_price'=> 180000,'image'=>'crepe-phap.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-10-26 03:00:16' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //6
            [
                'type_product_id'=> 5,'product_name'=>'Bánh Crepe Táo' ,'description'=>'' ,'unit_price'=> 160000,'promotion_price'=> 0,'image'=>'crepe-tao.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-10-26 03:00:16' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //7
            [
                'type_product_id'=> 5,'product_name'=>'Bánh Crepe Trà xanh' ,'description'=>'' ,'unit_price'=> 160000,'promotion_price'=> 150000,'image'=>'crepe-traxanh.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-10-26 03:00:16' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //8
            [
                'type_product_id'=> 5,'product_name'=>'Bánh Crepe Sầu riêng và Dứa' ,'description'=>'' ,'unit_price'=> 160000,'promotion_price'=> 150000,'image'=>'saurieng-dua.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-10-26 03:00:16' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //9
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Chocolate Dâu' ,'description'=>'' ,'unit_price'=> 300000,'promotion_price'=> 280000,'image'=>'banh kem sinh nhat.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //10
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Dâu III' ,'description'=>'' ,'unit_price'=> 300000,'promotion_price'=> 280000,'image'=>'Banh-kem (6).jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //11
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Dâu I' ,'description'=>'' ,'unit_price'=> 350000,'promotion_price'=> 320000,'image'=>'banhkem-dau.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //12
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Chocolate Dâu I' ,'description'=>'' ,'unit_price'=> 380000,'promotion_price'=> 350000,'image'=>'sli12.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //13
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Trái cây I' ,'description'=>'' ,'unit_price'=> 380000,'promotion_price'=> 350000,'image'=>'Fruit-Cake.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //14
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Trái cây II' ,'description'=>'' ,'unit_price'=> 380000,'promotion_price'=> 350000,'image'=>'Fruit-Cake_7971.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //15
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Doraemon' ,'description'=>'' ,'unit_price'=> 280000,'promotion_price'=> 250000,'image'=>'p1392962167_banh74.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //16
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Caramen Pudding' ,'description'=>'' ,'unit_price'=> 280000,'promotion_price'=> 0,'image'=>'Caramen-pudding636099031482099583.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //17
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Chocolate Fruit' ,'description'=>'' ,'unit_price'=> 320000,'promotion_price'=> 300000,'image'=>'chocolate-fruit636098975917921990.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //18
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Coffee Chocolate GH6' ,'description'=>'' ,'unit_price'=> 320000,'promotion_price'=> 300000,'image'=>'COFFE-CHOCOLATE636098977566220885.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //19
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Mango Mouse' ,'description'=>'' ,'unit_price'=> 320000,'promotion_price'=> 300000,'image'=>'mango-mousse-cake.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //20
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Matcha Mouse' ,'description'=>'' ,'unit_price'=> 350000,'promotion_price'=> 330000,'image'=>'MATCHA-MOUSSE.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //21
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Flower Fruit' ,'description'=>'' ,'unit_price'=> 350000,'promotion_price'=> 330000,'image'=>'flower-fruits636102461981788938.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //22
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Strawberry Delight' ,'description'=>'' ,'unit_price'=> 350000,'promotion_price'=> 330000,'image'=>'strawberry-delight636102445035635173.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //23
            [
                'type_product_id'=> 4,'product_name'=>'Bánh kem Raspberry Delight' ,'description'=>'' ,'unit_price'=> 350000,'promotion_price'=> 330000,'image'=>'raspberry.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-26 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //24
            [
                'type_product_id'=> 7,'product_name'=>'Bánh su kem nhân dừa' ,'description'=>'' ,'unit_price'=> 120000,'promotion_price'=> 100000,'image'=>'maxresdefault.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //25
            [
                'type_product_id'=> 7,'product_name'=>'Bánh su kem sữa tươi' ,'description'=>'' ,'unit_price'=> 120000,'promotion_price'=> 100000,'image'=>'sukem.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //26
            [
                'type_product_id'=> 7,'product_name'=>'Bánh su kem sữa tươi chiên giòn' ,'description'=>'' ,'unit_price'=> 150000,'promotion_price'=> 0,'image'=>'1434429117-banh-su-kem-chien-20.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //27
            [
                'type_product_id'=> 7,'product_name'=>'Bánh su kem dâu sữa tươi' ,'description'=>'' ,'unit_price'=> 120000,'promotion_price'=> 100000,'image'=>'sukemdau.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //28
            [
                'type_product_id'=> 7,'product_name'=>'Bánh su kem bơ sữa tươi' ,'description'=>'' ,'unit_price'=> 150000,'promotion_price'=> 0,'image'=>'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //29
            [
                'type_product_id'=> 7,'product_name'=>'Bánh su kem cà phê' ,'description'=>'' ,'unit_price'=> 150000,'promotion_price'=> 0,'image'=>'banh-su-kem-ca-phe-1.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //30
            [
                'type_product_id'=> 7,'product_name'=>'Bánh su kem nhân trái cây sữa tươi' ,'description'=>'' ,'unit_price'=> 150000,'promotion_price'=> 0,'image'=>'foody-banh-su-que-635930347896369908.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //31
            [
                'type_product_id'=> 7,'product_name'=>'Bánh su kem phô mai' ,'description'=>'' ,'unit_price'=> 150000,'promotion_price'=> 0,'image'=>'50020041-combo-20-banh-su-que-pho-mai-9.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 15:00:16' ,'updated_at'=>null ,'deleted_at'=>null,
            ],
            //32
            [
                'type_product_id'=> 6,'product_name'=>'Beefy Pizza' ,'description'=>'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella' ,'unit_price'=> 150000,'promotion_price'=> 130000,'image'=>'40819_food_pizza.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-11 02:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //33
            [
                'type_product_id'=> 6,'product_name'=>'Hawaii Pizza' ,'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella' ,'unit_price'=> 120000,'promotion_price'=> 0,'image'=>'hawaiian paradise_large-900x900.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-13 02:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //34
            [
                'type_product_id'=> 6,'product_name'=>'Smoke Chicken Pizza' ,'description'=>'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.' ,'unit_price'=> 120000,'promotion_price'=> 0,'image'=>'chicken black pepper_large-900x900.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-13 02:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //35
            [
                'type_product_id'=> 6,'product_name'=>'Sausage Pizza' ,'description'=>'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.' ,'unit_price'=> 120000,'promotion_price'=> 0,'image'=>'pizza-miami.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-13 02:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //36
            [
                'type_product_id'=> 6,'product_name'=>'Ocean Pizza' ,'description'=>'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.' ,'unit_price'=> 120000,'promotion_price'=> 0,'image'=>'seafood curry_large-900x900.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 02:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //37
            [
                'type_product_id'=> 6,'product_name'=>'All Meaty Pizza' ,'description'=>'Ham, bacon, chorizo, pho mai mozzarella.' ,'unit_price'=> 140000,'promotion_price'=> 0,'image'=>'all1).jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 02:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //38
            [
                'type_product_id'=> 6,'product_name'=>'Tuna Pizza' ,'description'=>'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella' ,'unit_price'=> 140000,'promotion_price'=> 0,'image'=>'54eaf93713081_-_07-germany-tuna.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-11-15 02:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            //39
            [
                'type_product_id'=> 2,'product_name'=>'Bánh ngọt nhân cream táo' ,'description'=>'' ,'unit_price'=> 180000,'promotion_price'=> 0,'image'=>'20131108144733.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-10 02:00:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 2,'product_name'=>'Bánh Chocolate Trái cây' ,'description'=>'' ,'unit_price'=> 150000,'promotion_price'=> 0,'image'=>'Fruit-Cake_7976.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-10 02:00:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 2,'product_name'=>'Bánh Chocolate Trái cây II' ,'description'=>'' ,'unit_price'=> 150000,'promotion_price'=> 0,'image'=>'Fruit-Cake_7981.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-10 02:00:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 2,'product_name'=>'Peach Cake' ,'description'=>'' ,'unit_price'=> 160000,'promotion_price'=> 150000,'image'=>'Peach-Cake_3294.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-12 02:00:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 2,'product_name'=>'Bánh Macaron Pháp' ,'description'=>'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.' ,'unit_price'=> 200000,'promotion_price'=> 180000,'image'=>'Macaron9.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-12 02:00:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 2,'product_name'=>'Bánh Tiramisu - Italia' ,'description'=>'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn' ,'unit_price'=> 200000,'promotion_price'=> 0,'image'=>'234.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-12 02:00:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 2,'product_name'=>'Bánh Táo - Mỹ' ,'description'=>'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.' ,'unit_price'=> 200000,'promotion_price'=> 0,'image'=>'1234.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-14 02:00:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 2,'product_name'=>'Bánh Cupcake - Anh Quốc' ,'description'=>'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.' ,'unit_price'=> 150000,'promotion_price'=> 120000,'image'=>'cupcake.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-10 02:00:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            [
                'type_product_id'=> 1,'product_name'=>'Bánh bông lan trứng muối I' ,'description'=>'' ,'unit_price'=> 160000,'promotion_price'=> 150000,'image'=>'banhbonglantrung.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-13 14:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 1,'product_name'=>'Bánh bông lan trứng muối II' ,'description'=>'' ,'unit_price'=> 180000,'promotion_price'=> 0,'image'=>'banhbonglantrungmuoi.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-13 14:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 1,'product_name'=>'Bánh French' ,'description'=>'' ,'unit_price'=> 180000,'promotion_price'=> 0,'image'=>'banh-man-thu-vi-nhat-1.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-13 14:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 1,'product_name'=>'Bánh mì Australia' ,'description'=>'' ,'unit_price'=> 80000,'promotion_price'=> 70000,'image'=>'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-14 15:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 1,'product_name'=>'Bánh mặn thập cẩm' ,'description'=>'' ,'unit_price'=> 50000,'promotion_price'=> 0,'image'=>'Fruit-Cake.png' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-14 15:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 1,'product_name'=>'Bánh Muffins trứng' ,'description'=>'' ,'unit_price'=> 100000,'promotion_price'=> 0,'image'=>'maxresdefault.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-16 19:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 1,'product_name'=>'Bánh Scone Peach Cake' ,'description'=>'' ,'unit_price'=> 120000,'promotion_price'=> 0,'image'=>'Peach-Cake_3300.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-16 19:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 1,'product_name'=>'Bánh mì Loaf I' ,'description'=>'' ,'unit_price'=> 100000,'promotion_price'=> 0,'image'=>'sli12.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-16 19:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            
            [
                'type_product_id'=> 3,'product_name'=>'Bánh trái cây II' ,'description'=>'' ,'unit_price'=> 150000,'promotion_price'=> 120000,'image'=>'banhtraicay.jpg' ,'unit'=>'hộp' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-20 19:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],

            [
                'type_product_id'=> 3,'product_name'=>'Apple Cake' ,'description'=>'' ,'unit_price'=> 250000,'promotion_price'=> 240000,'image'=>'Fruit-Cake_7979.jpg' ,'unit'=>'cái' ,'raw_material'=>null,'origin'=>null,'created_at'=>'2019-12-20 19:20:00' ,'updated_at'=>null ,'deleted_at'=>null
            ],
            
        ]);

        
    }
}
