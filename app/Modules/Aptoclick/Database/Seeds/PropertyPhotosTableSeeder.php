<?php

namespace Raffles\Modules\Aptoclick\Database\Seeds;

use Raffles\Modules\Aptoclick\Models\Property;

use Illuminate\Database\Seeder;

class PropertyPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = Property::find(1);
        $p->unfeatured_photos()->create(['location' => 'properties/5384422549.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/5324759316.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/5318515825.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/5316235997.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/5327039144.jpg']);
        $p->featured_photo()->create(['location' => 'properties/5384422549.jpg']);

        $p = Property::find(2);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181007_145835.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181007_145821.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181007_145815.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181007_145810.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181007_145802.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20181007_145835.jpg']);

        $p = Property::find(3);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20190104-WA0008.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20190104-WA0019.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20190104-WA0009.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20190104-WA0018.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20190104-WA0015.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20190104-WA0008.jpg']);

        $p = Property::find(4);
        $p->unfeatured_photos()->create(['location' => 'properties/BAÑO.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/RECÁMARA_PRINCIPAL.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/COCINA.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/SALA-COMEDOR.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/FACHADA_PERIF._ORIENTE.jpg']);
        $p->featured_photo()->create(['location' => 'properties/FACHADA_PERIF._ORIENTE.jpg']);

        $p = Property::find(5);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20171005-WA0007.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180824_155203.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20171005-WA0007.jpg']);

        $p = Property::find(6);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20190103-WA0001.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20190103-WA0002.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20190103-WA0003.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20190103-WA0003.jpg']);

        $p = Property::find(7);
        $p->unfeatured_photos()->create(['location' => 'properties/5.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/155.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/199.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181215_122402.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181215_110644.jpg']);
        $p->featured_photo()->create(['location' => 'properties/5.jpg']);

        $p = Property::find(8);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181202_094122.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181202_115849.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181202_094109.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20181202_094122.jpg']);

        $p = Property::find(9);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180316-WA0026.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181205_140448.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180316-WA0026.jpg']);

        $p = Property::find(10);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181203-WA0033.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181203-WA0036.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181203-WA0042.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181203-WA0039.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20181203-WA0033.jpg']);

        $p = Property::find(11);
        $p->unfeatured_photos()->create(['location' => 'properties/20181208_104830.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181208_104248.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181208_104316.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181208_104710.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181208_104531.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20181208_104830.jpg']);

        $p = Property::find(12);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181226_214642.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181226_214650.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181226_214659.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181224-WA0000.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20181226_214642.jpg']);

        $p = Property::find(13);
        $p->unfeatured_photos()->create(['location' => 'properties/coc_y_lav_mz.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Sala_comedor_arte.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Rec_2_Mz..jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Fachada_Eje_Central_78.jpg']);
        $p->featured_photo()->create(['location' => 'properties/coc_y_lav_mz.jpg']);

        $p = Property::find(13);
        $p->unfeatured_photos()->create(['location' => 'properties/recamara1.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/baño2.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image2018-12-21_at_10.19.30_AM.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image2018-12-21_at_10.17.30_AM.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/fachada1.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/fachada1.jpeg']);

        $p = Property::find(14);
        $p->unfeatured_photos()->create(['location' => 'properties/D60F531F-B767-4849-B135-DD8C373C6D9A.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/99B45EF2-851C-4CBA-B3E0-0EDFB0B6EC1D.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/2531327A-59C9-44D9-90FD-8E9FEF10D176.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/7ACADE9B-2C82-450C-A1C2-BF6B0D9B9FB7.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/1575E5B1-BFE8-4A34-B043-9886ADBE3DDC.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/D60F531F-B767-4849-B135-DD8C373C6D9A.jpeg']);

        $p = Property::find(15);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181223-WA0026.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181223-WA0018.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181223-WA0015.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181223-WA0014.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181223-WA0012.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20181223-WA0012.jpg']);

        $p = Property::find(16);
        $p->unfeatured_photos()->create(['location' => 'properties/IMAG0689.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMAG0689.jpg']);

        $p = Property::find(17);
        $p->unfeatured_photos()->create(['location' => 'properties/20181120_175328.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181120_175433.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181120_175303.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181120_175037.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181120_175127.png']);
        $p->featured_photo()->create(['location' => 'properties/20181120_175127.png']);

        $p = Property::find(18);
        $p->unfeatured_photos()->create(['location' => 'properties/DA132E02-55F5-4B44-A9BF-849E11D080CF.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/917F7923-3952-4EDC-8469-7835D8F0E26A.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/621A5168-EC22-4A82-9130-4CC21EF53E71.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/3D64172C-CF51-494C-A298-9A06BD26B34A.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/32179EC1-CE28-4BF2-B3BC-976386BE5FCB.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/32179EC1-CE28-4BF2-B3BC-976386BE5FCB.jpeg']);

        $p = Property::find(19);
        $p->unfeatured_photos()->create(['location' => 'properties/bungalow.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/vista_de_arriba.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/terraza_2.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/panorámica_2.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/alberca-jardín_1.jpg']);
        $p->featured_photo()->create(['location' => 'properties/panorámica_2.jpg']);

        $p = Property::find(20);
        $p->unfeatured_photos()->create(['location' => 'properties/Sala_PB.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Recamara1.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Planta_Baja.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Entrada_Principal.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Cocina_PB.jpg']);
        $p->featured_photo()->create(['location' => 'properties/Entrada_Principal.jpg']);

        $p = Property::find(21);
        $p->unfeatured_photos()->create(['location' => 'properties/mobile_Venta-depa-al-sur-de-la-Ciudad-en-la-mejor-.jpg']);
        $p->featured_photo()->create(['location' => 'properties/mobile_Venta-depa-al-sur-de-la-Ciudad-en-la-mejor-.jpg']);

        $p = Property::find(22);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180812-WA0002.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180812-WA0003.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180812-WA0004.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180817-WA0014.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180902-WA0004.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180902-WA0014.jpg']);

        $p = Property::find(23);
        $p->unfeatured_photos()->create(['location' => 'properties/thumbnail_EB-BW8070__1_.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181024-WA0012.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/thumbnail_IMG-20181024-WA0013.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/thumbnail_IMG-20181024-WA0014.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/thumbnail_IMG-20181024-WA0035.jpg']);
        $p->featured_photo()->create(['location' => 'properties/thumbnail_IMG-20181024-WA0035.jpg']);

        $p = Property::find(24);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181019_102924.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181019_103211.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181019_103624.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181019_103652.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181019_103733.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20181019_103733.jpg']);

        $p = Property::find(25);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0867_2.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0752.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0742.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0719.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/DSC02073.jpg']);
        $p->featured_photo()->create(['location' => 'properties/DSC02073.jpg']);

        $p = Property::find(26);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180831_140441913.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180706_124321595.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180831_135632806.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180602_131142825.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180831_135521457_HDR.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180831_135521457_HDR.jpg']);

        $p = Property::find(27);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181025-WA0033.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181025-WA0040.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181025-WA0017.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181025-WA0008.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Screen_Shot_2018-10-31_at_14.39.39.png']);
        $p->featured_photo()->create(['location' => 'properties/Screen_Shot_2018-10-31_at_14.39.39.png']);

        $p = Property::find(28);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180719-WA0031.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180719-WA0031.jpg']);

        $p = Property::find(29);
        $p->unfeatured_photos()->create(['location' => 'properties/20181013_104312.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181013_104329.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181013_104441.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181013_104452.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181013_103432.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20181013_103432.jpg']);

        $p = Property::find(30);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181009_133443.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181016_152551_HDR.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181017_165220_HDR.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181018_002311_HDR.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181018_005442_HDR.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20181017_165220_HDR.jpg']);

        $p = Property::find(30);
        $p->unfeatured_photos()->create(['location' => 'properties/5_1.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/4.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/3.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/1.jpg']);
        $p->featured_photo()->create(['location' => 'properties/5_1.jpg']);

        $p = Property::find(31);
        $p->unfeatured_photos()->create(['location' => 'properties/2_1.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/1_1.jpg']);
        $p->featured_photo()->create(['location' => 'properties/2_1.jpg']);

        $p = Property::find(32);
        $p->unfeatured_photos()->create(['location' => 'properties/20181003_165335.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20181003_165335.jpg']);

        $p = Property::find(33);
        $p->unfeatured_photos()->create(['location' => 'properties/20181016_154942.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181016_155021.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20181016_155243.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181012-WA0066.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181012-WA0065.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20181012-WA0065.jpg']);

        $p = Property::find(34);
        $p->unfeatured_photos()->create(['location' => 'properties/20181003_165335.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20181003_165335.jpg']);

        $p = Property::find(35);
        $p->unfeatured_photos()->create(['location' => 'properties/20180918_171331.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180911_130558.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180911_130331.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180911_163655.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180911_130313.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20180911_163655.jpg']);

        $p = Property::find(36);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180117-WA0010.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180117-WA0017.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180117-WA0006.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180117-WA0004.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180117-WA0018.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180117-WA0018.jpg']);

        $p = Property::find(37);
        $p->unfeatured_photos()->create(['location' => 'properties/s-l800.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/s-l8001.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/s-l8003.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Venta_Casa__1_.png']);
        $p->featured_photo()->create(['location' => 'properties/s-l8001.jpg']);

        $p = Property::find(38);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180905-WA0015.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180905-WA0021.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180905-WA0025.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180905-WA0025.jpeg']);

        $p = Property::find(39);
        $p->unfeatured_photos()->create(['location' => 'properties/20180915_155245.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180915_155309.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180915_155148.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180906_120823.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180906_120841.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20180906_120841.jpg']);

        $p = Property::find(40);
        $p->unfeatured_photos()->create(['location' => 'properties/interior_6.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/interior_7.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/Interior_bodega.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/Vista_aerea_1.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/Frente_Av._m.tacuba.png']);
        $p->featured_photo()->create(['location' => 'properties/Frente_Av._m.tacuba.png']);

        $p = Property::find(41);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180628_195712979.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180628_195712979.jpg']);

        $p = Property::find(42);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181011-WA0128.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20181011-WA0128.jpg']);

        $p = Property::find(43);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180712-WA0034.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180712-WA0032.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180712-WA0031.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180712-WA0030.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180712-WA0029.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180712-WA0032.jpg']);

        $p = Property::find(44);
        $p->unfeatured_photos()->create(['location' => 'properties/family_room.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/vestibulo.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/estancia.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/entrada_principal.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/fachada.jpg']);
        $p->featured_photo()->create(['location' => 'properties/fachada.jpg']);

        $p = Property::find(45);
        $p->unfeatured_photos()->create(['location' => 'properties/97C31402-257E-4FDA-A734-130569186EFC.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/3557CC19-54C8-4E05-8468-9B261C42754C.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/DC8FC301-6667-4AF3-990D-2F99E449A1D8.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/BB5050FC-EB4C-42ED-ACFD-6B8739F913F3.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/0D256839-D43E-4BBB-B599-28D23FCB8EC7.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/0D256839-D43E-4BBB-B599-28D23FCB8EC7.jpeg']);

        $p = Property::find(46);
        $p->unfeatured_photos()->create(['location' => 'properties/734A11CB-292A-444C-8999-C11A504FD18E.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/FA41276A-CB73-439D-A03C-1A5602F72D97.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/503AFAA6-EB1D-4B1B-BECE-BFC1603236B9.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/F8C75B15-DF17-4969-A3C9-5794D0EB1E5F.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/6DBDE2F6-631F-44B7-AE80-4F90361EC014.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/6DBDE2F6-631F-44B7-AE80-4F90361EC014.jpeg']);

        $p = Property::find(47);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0094.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0093.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0092.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0088.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0076.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_0094.jpg']);

        $p = Property::find(48);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180712-WA0016_1_.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/P_20180716_174505_vHDR_Auto_HP.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180723-WA0015.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180723-WA0016.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/P_20180716_174413_vHDR_Auto_HP.jpg']);
        $p->featured_photo()->create(['location' => 'properties/P_20180716_174413_vHDR_Auto_HP.jpg']);

        $p = Property::find(49);
        $p->unfeatured_photos()->create(['location' => 'properties/Captura_de_pantalla_2018-10-09_a_la_s__4.07.58_p._.png']);
        $p->featured_photo()->create(['location' => 'properties/Captura_de_pantalla_2018-10-09_a_la_s__4.07.58_p._.png']);

        $p = Property::find(50);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180908_161710177.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180908_162712058.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180908_162120218.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180908_163209625.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180908_162120218.jpg']);

        $p = Property::find(51);
        $p->unfeatured_photos()->create(['location' => 'properties/19399999_1138797189559077_6188764019667492671_n.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/19399758_1138797272892402_759530043275043194_n.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/19366619_1138796596225803_4976477303550664296_n.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/19366528_1138796592892470_158321840624773261_n.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/19366488_1138796949559101_4852791173786534907_n.jpg']);
        $p->featured_photo()->create(['location' => 'properties/19366488_1138796949559101_4852791173786534907_n.jpg']);

        $p = Property::find(52);
        $p->unfeatured_photos()->create(['location' => 'properties/__19__1_.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/__19.jpg']);
        $p->featured_photo()->create(['location' => 'properties/__19.jpg']);

        $p = Property::find(53);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181002_072832.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181002_072809.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181002_072900.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181002-WA0010.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20181002_120641.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20181002_120641.jpg']);

        $p = Property::find(54);
        $p->unfeatured_photos()->create(['location' => 'properties/049414E6-2139-4B99-BE8C-041CF554C13A.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/049414E6-2139-4B99-BE8C-041CF554C13A.jpeg']);

        $p = Property::find(55);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180926-WA0020.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180926-WA0020.jpg']);

        $p = Property::find(56);
        $p->unfeatured_photos()->create(['location' => 'properties/748DE717-600C-441F-9085-97CDB835D464.png']);
        $p->featured_photo()->create(['location' => 'properties/748DE717-600C-441F-9085-97CDB835D464.png']);

        $p = Property::find(57);
        $p->unfeatured_photos()->create(['location' => 'properties/16588F18-4E9B-4AAC-A924-F2D5D5B53F80.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/E36BB75C-AC40-433D-8900-BC2B11AFA671.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/46B5B69A-D5CF-4CED-925C-D3D2128CFADA.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/8E555887-62CD-4A26-A131-3A272AD238DC.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/8E555887-62CD-4A26-A131-3A272AD238DC.jpeg']);

        $p = Property::find(58);
        $p->unfeatured_photos()->create(['location' => 'properties/Screenshot_20181004-150724.png']);
        $p->featured_photo()->create(['location' => 'properties/Screenshot_20181004-150724.png']);

        $p = Property::find(59);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181005-WA0001.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20181005-WA0001.jpg']);

        $p = Property::find(60);
        $p->unfeatured_photos()->create(['location' => 'properties/264EE19A-4E67-4B53-8950-CE0F3AE2548D.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/A7EF252C-E584-4C99-8AEF-86E94BAA9C0B.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/9B094B35-CD13-43FE-9F6A-058E14AD5B38.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/10A4E53C-5A7A-4EC1-AAC6-7A594479D0AD.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/094838C6-867E-4D20-96BE-53C0131441E3.png']);
        $p->featured_photo()->create(['location' => 'properties/9B094B35-CD13-43FE-9F6A-058E14AD5B38.jpeg']);

        $p = Property::find(61);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20181004-WA0038.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20181004-WA0038.jpg']);

        $p = Property::find(62);
        $p->unfeatured_photos()->create(['location' => 'properties/20180329_162252.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180329_162347.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180329_162428.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180329_162237.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20180329_162252.jpg']);

        $p = Property::find(63);
        $p->unfeatured_photos()->create(['location' => 'properties/73E085A0-A0C9-4BC8-97B5-0B46A45306A8.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/A6B0DF69-2581-4629-97B1-A8890B00CFBD.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/52E8FA55-5FCC-4253-B7A5-7BB1F7C5049F.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/5B203F6E-123F-4AB6-9BB9-A4355433CFD9.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/527FA83D-80A7-4123-835D-0BB61765298F.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/527FA83D-80A7-4123-835D-0BB61765298F.jpeg']);

        $p = Property::find(64);
        $p->unfeatured_photos()->create(['location' => 'properties/pasillo.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/estanciaespej.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/barracocina.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/estancia.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/casa_club.jpg']);
        $p->featured_photo()->create(['location' => 'properties/casa_club.jpg']);

        $p = Property::find(65);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2017-11-05_at_10.09.24_PM.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/WhatsApp_Image_2017-11-05_at_10.09.24_PM.jpeg']);

        $p = Property::find(66);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-10-02_at_09.34.47.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-10-02_at_09.34.15.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-10-02_at_09.33.59.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-10-02_at_09.33.30.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-10-02_at_09.33.06.jpg']);
        $p->featured_photo()->create(['location' => 'properties/WhatsApp_Image_2018-10-02_at_09.33.59.jpg']);

        $p = Property::find(67);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180812-WA0007.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180812-WA0007.jpg']);

        $p = Property::find(68);
        $p->unfeatured_photos()->create(['location' => 'properties/FB_IMG_15355108986521595.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/FB_IMG_15355109033632146.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/FB_IMG_15355109134535730.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/FB_IMG_15355108920962822.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180924_130614.jpg']);
        $p->featured_photo()->create(['location' => 'properties/FB_IMG_15355108920962822.jpg']);

        $p = Property::find(69);
        $p->unfeatured_photos()->create(['location' => 'properties/image5.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/image4.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/image3.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/image2.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/image1.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/image2.jpeg']);

        $p = Property::find(70);
        $p->unfeatured_photos()->create(['location' => 'properties/DESAYUNADOR.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/ENTRADA.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/CHIMENEA.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/CASCADA.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/CANTINA.jpg']);
        $p->featured_photo()->create(['location' => 'properties/CHIMENEA.jpg']);

        $p = Property::find(71);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_5896.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_5895.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_5888.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_5886.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_5883.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_5888.jpg']);

        $p = Property::find(72);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_073937.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_073923.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_073451.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_073711.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_074458.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20170620_074458.jpg']);

        $p = Property::find(73);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0318.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0314.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0309.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0306.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_0305.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_0318.jpg']);

        $p = Property::find(74);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_074059.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_074005.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_073451.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_073511.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20170620_074458.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20170620_074458.jpg']);

        $p = Property::find(75);
        $p->unfeatured_photos()->create(['location' => 'properties/BC3B68E0-EF57-4071-8E6F-7A010175BF9A.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/5013A573-D8A9-4ADF-B113-145B00E54F92.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/A017166D-C290-4476-972C-0BDADB8EA796.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/0DB2EC67-4830-484A-8DD5-4B4308C04D06.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/41BB53AC-DBF5-41F7-A11B-FB6297167C02.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/41BB53AC-DBF5-41F7-A11B-FB6297167C02.jpeg']);

        $p = Property::find(76);
        $p->unfeatured_photos()->create(['location' => 'properties/18.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/14.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/5_2.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/9.jpg']);
        $p->featured_photo()->create(['location' => 'properties/9.jpg']);

        $p = Property::find(77);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180528-WA0025.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180528-WA0030.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180528-WA0029.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180528-WA0028.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180528-WA0027.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180528-WA0029.jpg']);

        $p = Property::find(78);
        $p->unfeatured_photos()->create(['location' => 'properties/Sala_tv_DSC_0300.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Recámara_fondo_closset_DSC_0290.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Recámara_fodo_desde_pasillo_DSC_0291.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/puerta_entrada_DSC_0302.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Entrada_escaleras_Disco_Mam ́streami.jpg']);
        $p->featured_photo()->create(['location' => 'properties/Entrada_escaleras_Disco_Mam ́streami.jpg']);

        $p = Property::find(79);
        $p->unfeatured_photos()->create(['location' => 'properties/puerta_depto.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_4408.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_4426.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_4430.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_4431.jpg']);
        $p->featured_photo()->create(['location' => 'properties/puerta_depto.jpg']);

        $p = Property::find(80);
        $p->unfeatured_photos()->create(['location' => 'properties/fachada.jpg']);
        $p->featured_photo()->create(['location' => 'properties/fachada.jpg']);

        $p = Property::find(81);
        $p->unfeatured_photos()->create(['location' => 'properties/casa2.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/casa4depto_independiente.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Casa_estacionamiento.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/casa_fachada.jpg']);
        $p->featured_photo()->create(['location' => 'properties/casa_fachada.jpg']);

        $p = Property::find(82);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180830-WA0027.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180830-WA0028.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/FB_IMG_1537406830598.jpg']);
        $p->featured_photo()->create(['location' => 'properties/FB_IMG_1537406830598.jpg']);

        $p = Property::find(83);
        $p->unfeatured_photos()->create(['location' => 'properties/18.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/índice.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/4.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/14.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20.jpg']);

        $p = Property::find(84);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180304-WA0030.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180304-WA0027.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180304-WA0022.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180304-WA0021.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180320_230209.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180304-WA0021.jpg']);

        $p = Property::find(85);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180907-WA0008.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180905-WA0023.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180905-WA0027.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180907-WA0009.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180905-WA0020.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180905-WA0020.jpg']);

        $p = Property::find(86);
        $p->unfeatured_photos()->create(['location' => 'properties/20150331_093457.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20150331_093243.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20150331_093159.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20150331_093136.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20150331_093631.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20150331_093631.jpg']);

        $p = Property::find(87);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180923_131344006.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180923_131344006.jpg']);

        $p = Property::find(88);
        $p->unfeatured_photos()->create(['location' => 'properties/Sin_título_4.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/Sin_título_3.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/Sin_título_2.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/Sin_título_1.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/Sin_título_0.png']);
        $p->featured_photo()->create(['location' => 'properties/Sin_título_2.png']);

        $p = Property::find(89);
        $p->unfeatured_photos()->create(['location' => 'properties/20180921_165737.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20180921_165737.jpg']);

        $p = Property::find(90);
        $p->unfeatured_photos()->create(['location' => 'properties/Andador_Jade_2018_jpeg.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Portico_Jade_Nuevo.png']);
        $p->unfeatured_photos()->create(['location' => 'properties/R-02_Isometrico_2.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Casa_Club_Jade_JPEG.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Andador_Rosamorada_JPEG.jpg']);
        $p->featured_photo()->create(['location' => 'properties/Andador_Rosamorada_JPEG.jpg']);

        $p = Property::find(91);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180608_133044.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180608_133110.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180608_133715.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180608_133724.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180608_133724.jpg']);

        $p = Property::find(92);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180824_155216.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180824_155229.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180824_155203.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180824_155203.jpg']);

        $p = Property::find(93);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_6336.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_6336.jpg']);

        $p = Property::find(94);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-06_at_4.54.13_PM__1_.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/WhatsApp_Image_2018-08-06_at_4.54.13_PM__1_.jpeg']);

        $p = Property::find(95);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_6358.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_6357.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_6357.jpg']);

        $p = Property::find(96);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180919-WA0009.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180919-WA0016.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180919-WA0023.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180919-WA0026.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180919-WA0029.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180919-WA0023.jpg']);

        $p = Property::find(97);
        $p->unfeatured_photos()->create(['location' => 'properties/A22315DA-6905-4074-B2E0-E72732634BB1.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/A22315DA-6905-4074-B2E0-E72732634BB1.jpeg']);

        $p = Property::find(98);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__5_.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__4_.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__3_.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__2_.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__2_.jpeg']);

        $p = Property::find(99);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180828_160914885.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180828_160445538.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180828_160501710.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180828_160714278_LL.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180828_165306083.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180828_165306083.jpg']);

        $p = Property::find(100);
        $p->unfeatured_photos()->create(['location' => 'properties/alb.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180712_140537997__1_.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180712_140537997__1_.jpg']);

        $p = Property::find(101);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_2166.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_2167.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_2170.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_2171.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_2173.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_2173.jpg']);

        $p = Property::find(102);
        $p->unfeatured_photos()->create(['location' => 'properties/298338AC-66FF-4AF5-AD92-9E3207A54D61.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/298338AC-66FF-4AF5-AD92-9E3207A54D61.jpeg']);

        $p = Property::find(103);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180726_161911.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180726_162025.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180726_161755.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180903-WA0016.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180726_161755.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180726_161755.jpg']);

        $p = Property::find(104);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180807-WA0030.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180807-WA0031.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180807-WA0045.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180807-WA0050.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180807-WA0057.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180807-WA0057.jpg']);

        $p = Property::find(105);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180824-WA0008.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180807-WA0090.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180807-WA0097.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180807-WA0102.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG-20180903-WA0013.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG-20180903-WA0013.jpg']);

        $p = Property::find(106);
        $p->unfeatured_photos()->create(['location' => 'properties/106403510.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/106403504.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/106403500.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/106403502.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/106403512.jpg']);
        $p->featured_photo()->create(['location' => 'properties/106403512.jpg']);

        $p = Property::find(107);
        $p->unfeatured_photos()->create(['location' => 'properties/180918_084516_COLLAGE-1.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/20180905_160257.jpg']);
        $p->featured_photo()->create(['location' => 'properties/20180905_160257.jpg']);

        $p = Property::find(108);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__5_.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__4_.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__3_.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__2_.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/WhatsApp_Image_2018-08-30_at_14.52.10__2_.jpeg']);

        $p = Property::find(109);
        $p->unfeatured_photos()->create(['location' => 'properties/109118739.webp']);
        $p->unfeatured_photos()->create(['location' => 'properties/109118741.webp']);
        $p->unfeatured_photos()->create(['location' => 'properties/109118739.webp']);
        $p->unfeatured_photos()->create(['location' => 'properties/109345632.webp']);
        $p->unfeatured_photos()->create(['location' => 'properties/109118731.webp']);
        $p->featured_photo()->create(['location' => 'properties/109118731.webp']);

        $p = Property::find(110);
        $p->unfeatured_photos()->create(['location' => 'properties/FAC4.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/FAC7.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/FAC.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/CASAFAC.jpg']);
        $p->featured_photo()->create(['location' => 'properties/CASAFAC.jpg']);

        $p = Property::find(111);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180409_115454.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180409_115405.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180409_115359.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180409_115637.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180409_115542__1_.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180409_115542__1_.jpg']);

        $p = Property::find(112);
        $p->unfeatured_photos()->create(['location' => 'properties/Ocoyoacac_15.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Ocoyoacac_20.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Ocoyoacac_19.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Ocoyoacac_17.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/Ocoyoacac_16.jpg']);
        $p->featured_photo()->create(['location' => 'properties/Ocoyoacac_16.jpg']);

        $p = Property::find(113);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180917_115723427.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180917_115723427.jpg']);

        $p = Property::find(114);
        $p->unfeatured_photos()->create(['location' => 'properties/22116A71-B8E6-4439-B7FB-85A0F349478A.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/813D2310-DCC2-47BB-A565-712777DFB44F.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/F1AF8DA0-5889-404D-98BA-A25FAEAC258D.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/EAE6E64A-C64B-4D48-9117-123748448B73.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/6B1D55BB-8779-4CD9-BDC1-D6299F722CF2.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/6B1D55BB-8779-4CD9-BDC1-D6299F722CF2.jpeg']);

        $p = Property::find(115);
        $p->unfeatured_photos()->create(['location' => 'properties/VISTA_2.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/TERRAZA.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/3ESCALERA.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/1COCINA.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/0depa_1.jpg']);
        $p->featured_photo()->create(['location' => 'properties/0depa_1.jpg']);

        $p = Property::find(116);
        $p->unfeatured_photos()->create(['location' => 'properties/RIOJA__19_.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/RIOJA__19_.jpeg']);

        $p = Property::find(117);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180902_142922194.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180902_134247602.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180902_142635959.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180902_142804975.jpg']);
        $p->unfeatured_photos()->create(['location' => 'properties/IMG_20180902_142819089.jpg']);
        $p->featured_photo()->create(['location' => 'properties/IMG_20180902_142819089.jpg']);

        $p = Property::find(118);
        $p->unfeatured_photos()->create(['location' => 'properties/1623BAA1-9156-4EA3-B02E-95D131A082F6.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/3752F2EF-8C1F-4B7C-B6AC-700797730A99.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/BD02ED4C-EAC7-4DAC-9B87-9C11F304F9BA.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/08A08E1B-C7A7-47A6-B6A7-A3986660EC27.jpeg']);
        $p->unfeatured_photos()->create(['location' => 'properties/7355CF2D-7215-400C-8468-A37E06A5134D.jpeg']);
        $p->featured_photo()->create(['location' => 'properties/7355CF2D-7215-400C-8468-A37E06A5134D.jpeg']);
    }
}
