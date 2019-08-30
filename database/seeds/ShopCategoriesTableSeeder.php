<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $denja_data = '[{"id":1,"description":"\u0635\u0628\u062d\u0627\u0646\u0647","title":"\u0635\u0628\u062d\u0627\u0646\u0647","image2":"images\/icons\/restaurant_pack\/sausages.svg","shop_id":1,"order":0,"meta_description":"\u0635\u0628\u062d\u0627\u0646\u0647","url":"sbhanh","activated":1,"google_index":1},{"id":2,"description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","title":"\u067e\u06cc\u0634 \u063a\u0630\u0627","image2":"images\/icons\/restaurant_pack\/soup.svg","shop_id":1,"order":1,"meta_description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","url":"psh-ghtha","activated":1,"google_index":1},{"id":3,"description":"\u063a\u0630\u0627\u06cc \u0627\u0635\u0644\u06cc","title":"\u063a\u0630\u0627\u06cc \u0627\u0635\u0644\u06cc","image2":"images\/icons\/restaurant_pack\/fast-food.svg","shop_id":1,"order":2,"meta_description":"\u063a\u0630\u0627\u06cc \u0627\u0635\u0644\u06cc","url":"ghtha-asl","activated":1,"google_index":1},{"id":4,"description":"\u0627\u0633\u0645\u0648\u062a\u06cc \u0648 \u0645\u0627\u06a9\u062a\u0644","title":"\u0627\u0633\u0645\u0648\u062a\u06cc \u0648 \u0645\u0627\u06a9\u062a\u0644","image2":"images\/icons\/restaurant_pack\/cocktail.svg","shop_id":1,"order":3,"meta_description":"\u0627\u0633\u0645\u0648\u062a\u06cc \u0648 \u0645\u0627\u06a9\u062a\u0644","url":"asmot-o-maktl","activated":1,"google_index":1},{"id":5,"description":"\u0622\u0628\u0645\u06cc\u0648\u0647 \u0648 \u0634\u06cc\u06a9","title":"\u0622\u0628\u0645\u06cc\u0648\u0647 \u0648 \u0634\u06cc\u06a9","image2":"images\/icons\/restaurant_pack\/fruit.svg","shop_id":1,"order":4,"meta_description":"\u0622\u0628\u0645\u06cc\u0648\u0647 \u0648 \u0634\u06cc\u06a9","url":"aabmoh-o-shk","activated":1,"google_index":1},{"id":6,"description":"\u0642\u0647\u0648\u0647","title":"\u0642\u0647\u0648\u0647","image2":"images\/icons\/restaurant_pack\/hot-coffee.svg","shop_id":1,"order":6,"meta_description":"\u0642\u0647\u0648\u0647","url":"khoh","activated":1,"google_index":1},{"id":7,"description":"\u062f\u0645\u0646\u0648\u0634","title":"\u062f\u0645\u0646\u0648\u0634","image2":"images\/icons\/restaurant_pack\/herbal-tea.svg","shop_id":1,"order":5,"meta_description":"\u062f\u0645\u0646\u0648\u0634","url":"dmnosh","activated":1,"google_index":1},{"id":8,"description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0648 \u062f\u0633\u0631","title":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0648 \u062f\u0633\u0631","image2":"images\/icons\/restaurant_pack\/ice-cream.svg","shop_id":1,"order":9,"meta_description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0648 \u062f\u0633\u0631","url":"noshdn-o-dsr","activated":1,"google_index":1},{"id":9,"description":"\u0645\u062e\u0635\u0648\u0635 \u062f\u0650\u0646\u062c\u0627","title":"\u0645\u062e\u0635\u0648\u0635 \u062f\u0650\u0646\u062c\u0627","image2":"images\/icons\/restaurant_pack\/cutlery.svg","shop_id":1,"order":8,"meta_description":"\u0645\u062e\u0635\u0648\u0635 \u062f\u0650\u0646\u062c\u0627","url":"mkhsos-dnja","activated":1,"google_index":1},{"id":10,"description":"\u0686\u0627\u06cc \u0627\u0631\u06af\u0627\u0646\u06cc\u06a9 \u0644\u0627\u0647\u06cc\u062c\u0627\u0646","title":"\u0686\u0627\u06cc \u0627\u0631\u06af\u0627\u0646\u06cc\u06a9 \u0644\u0627\u0647\u06cc\u062c\u0627\u0646","image2":"images\/icons\/restaurant_pack\/vegan.svg","shop_id":1,"order":7,"meta_description":"\u0686\u0627\u06cc \u0627\u0631\u06af\u0627\u0646\u06cc\u06a9 \u0644\u0627\u0647\u06cc\u062c\u0627\u0646","url":"cha-argank-lahjan","activated":1,"google_index":1},{"id":12,"description":"\u06a9\u06cc\u06a9 \u0648 \u0686\u06cc\u0632\u06a9\u06cc\u06a9","title":"\u06a9\u06cc\u06a9 \u0648 \u0686\u06cc\u0632\u06a9\u06cc\u06a9","image2":"images\/icons\/restaurant_pack\/piece-of-cake.svg","shop_id":1,"order":10,"meta_description":"\u06a9\u06cc\u06a9 \u0648 \u0686\u06cc\u0632\u06a9\u06cc\u06a9","url":"kk-o-chzkk","activated":1,"google_index":1},{"id":14,"description":"\u067e\u0627\u06cc \u0648 \u062a\u0627\u0631\u062a","title":"\u067e\u0627\u06cc \u0648 \u062a\u0627\u0631\u062a","image2":"images\/icons\/restaurant_pack\/snack.svg","shop_id":1,"order":13,"meta_description":"\u067e\u0627\u06cc \u0648 \u062a\u0627\u0631\u062a","url":"pa-o-tart","activated":1,"google_index":1},{"id":15,"description":"\u06a9\u0648\u06a9\u06cc \u0648 \u06a9\u0631\u0627\u0633\u0627\u0646","title":"\u06a9\u0648\u06a9\u06cc \u0648 \u06a9\u0631\u0627\u0633\u0627\u0646","image2":"images\/icons\/restaurant_pack\/croissant.svg","shop_id":1,"order":12,"meta_description":"\u06a9\u0648\u06a9\u06cc \u0648 \u06a9\u0631\u0627\u0633\u0627\u0646","url":"kok-o-krasan","activated":1,"google_index":1},{"id":16,"description":"\u0634\u06cc\u0631\u06cc\u0646\u06cc","title":"\u0634\u06cc\u0631\u06cc\u0646\u06cc","image2":"images\/icons\/restaurant_pack\/cake.svg","shop_id":1,"order":11,"meta_description":"\u0634\u06cc\u0631\u06cc\u0646\u06cc","url":"shrn","activated":1,"google_index":1}]';

        $cinemacafe_data = '[{"id":2,"description":"\u0642\u0647\u0648\u0647 \u06af\u0631\u0645 \u0628\u062f\u0648\u0646 \u0634\u06cc\u0631 \u06a9\u0644\u0627\u0633\u06cc\u06a9","title":"\u0642\u0647\u0648\u0647 \u06af\u0631\u0645 \u0628\u062f\u0648\u0646 \u0634\u06cc\u0631 \u06a9\u0644\u0627\u0633\u06cc\u06a9","image2":"images\/icons\/restaurant_pack\/hot-coffee.svg","shop_id":1,"order":3,"meta_description":"\u0642\u0647\u0648\u0647 \u06af\u0631\u0645 \u0628\u062f\u0648\u0646 \u0634\u06cc\u0631 \u06a9\u0644\u0627\u0633\u06cc\u06a9","url":"khoh-grm-bdon-shr-klask","activated":1,"google_index":1},{"id":4,"description":"\u0642\u0647\u0648\u0647 \u0647\u0627\u06cc \u0633\u0631\u062f","title":"\u0642\u0647\u0648\u0647 \u0647\u0627\u06cc \u0633\u0631\u062f","image2":"images\/icons\/restaurant_pack\/cold-coffee.svg","shop_id":1,"order":2,"meta_description":"\u0642\u0647\u0648\u0647 \u0647\u0627\u06cc \u0633\u0631\u062f","url":"khoh-ha-srd","activated":1,"google_index":1},{"id":5,"description":"\u0645\u06cc\u0627\u0646 \u0648\u0639\u062f\u0647","title":"\u0645\u06cc\u0627\u0646 \u0648\u0639\u062f\u0647","image2":"images\/icons\/restaurant_pack\/snack.svg","shop_id":1,"order":6,"meta_description":"\u0645\u06cc\u0627\u0646 \u0648\u0639\u062f\u0647","url":"man-oaadh","activated":1,"google_index":1},{"id":6,"description":"\u06a9\u06cc\u06a9","title":"\u06a9\u06cc\u06a9","image2":"images\/icons\/restaurant_pack\/piece-of-cake.svg","shop_id":1,"order":7,"meta_description":"\u06a9\u06cc\u06a9","url":"kk","activated":1,"google_index":1},{"id":7,"description":"\u0686\u0627\u06cc \u0648 \u062f\u0645\u0646\u0648\u0634","title":"\u0686\u0627\u06cc \u0648 \u062f\u0645\u0646\u0648\u0634","image2":"images\/icons\/restaurant_pack\/herbal-tea.svg","shop_id":1,"order":8,"meta_description":"\u0686\u0627\u06cc \u0648 \u062f\u0645\u0646\u0648\u0634","url":"cha-o-dmnosh","activated":1,"google_index":1},{"id":9,"description":"\u0628\u0633\u062a\u0646\u06cc \u0648 \u0634\u06cc\u06a9 \u0628\u0633\u062a\u0646\u06cc","title":"\u0628\u0633\u062a\u0646\u06cc \u0648 \u0634\u06cc\u06a9 \u0628\u0633\u062a\u0646\u06cc","image2":"images\/icons\/restaurant_pack\/milkshake.svg","shop_id":1,"order":9,"meta_description":"\u0628\u0633\u062a\u0646\u06cc \u0648 \u0634\u06cc\u06a9 \u0628\u0633\u062a\u0646\u06cc","url":"bstn-o-shk-bstn","activated":1,"google_index":1},{"id":10,"description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0647\u0627\u06cc \u0633\u0631\u062f","title":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0647\u0627\u06cc \u0633\u0631\u062f","image2":"images\/icons\/restaurant_pack\/cold-drink.svg","shop_id":1,"order":1,"meta_description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0647\u0627\u06cc \u0633\u0631\u062f","url":"noshdn-ha-srd","activated":1,"google_index":1},{"id":11,"description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0633\u0646\u062a\u06cc \u0627\u06cc\u0631\u0627\u0646\u06cc","title":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0633\u0646\u062a\u06cc \u0627\u06cc\u0631\u0627\u0646\u06cc","image2":"images\/icons\/restaurant_pack\/vegan.svg","shop_id":1,"order":0,"meta_description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0633\u0646\u062a\u06cc \u0627\u06cc\u0631\u0627\u0646\u06cc","url":"noshdn-snt-aran","activated":1,"google_index":1},{"id":12,"description":"\u0627\u0633\u0645\u0648\u062a\u06cc","title":"\u0627\u0633\u0645\u0648\u062a\u06cc","image2":"images\/icons\/restaurant_pack\/smoothie.svg","shop_id":1,"order":10,"meta_description":"\u0627\u0633\u0645\u0648\u062a\u06cc","url":"asmot","activated":1,"google_index":1},{"id":14,"description":"\u0635\u0628\u062d\u0627\u0646\u0647","title":"\u0635\u0628\u062d\u0627\u0646\u0647","image2":"images\/icons\/restaurant_pack\/sausages.svg","shop_id":1,"order":11,"meta_description":"\u0635\u0628\u062d\u0627\u0646\u0647","url":"sbhanh","activated":1,"google_index":1},{"id":15,"description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","title":"\u067e\u06cc\u0634 \u063a\u0630\u0627","image2":"images\/icons\/restaurant_pack\/soup.svg","shop_id":1,"order":12,"meta_description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","url":"psh-ghtha","activated":1,"google_index":1},{"id":16,"description":"\u0633\u0627\u0644\u0627\u062f","title":"\u0633\u0627\u0644\u0627\u062f","image2":"images\/icons\/restaurant_pack\/salad.svg","shop_id":1,"order":13,"meta_description":"\u0633\u0627\u0644\u0627\u062f","url":"salad","activated":1,"google_index":1},{"id":17,"description":"\u06af\u06cc\u0627\u0647 \u062e\u0648\u0627\u0631\u06cc","title":"\u06af\u06cc\u0627\u0647 \u062e\u0648\u0627\u0631\u06cc","image2":"images\/icons\/restaurant_pack\/fruit.svg","shop_id":1,"order":14,"meta_description":"\u06af\u06cc\u0627\u0647 \u062e\u0648\u0627\u0631\u06cc","url":"gah-khoar","activated":1,"google_index":1},{"id":18,"description":"\u0633\u0627\u0646\u062f\u0648\u06cc\u0686","title":"\u0633\u0627\u0646\u062f\u0648\u06cc\u0686","image2":"images\/icons\/restaurant_pack\/sandwich.svg","shop_id":1,"order":15,"meta_description":"\u0633\u0627\u0646\u062f\u0648\u06cc\u0686","url":"sandoch","activated":1,"google_index":1},{"id":19,"description":"\u067e\u06cc\u062a\u0632\u0627","title":"\u067e\u06cc\u062a\u0632\u0627","image2":"images\/icons\/restaurant_pack\/pizza.svg","shop_id":1,"order":16,"meta_description":"\u067e\u06cc\u062a\u0632\u0627","url":"ptza","activated":1,"google_index":1},{"id":20,"description":"\u067e\u0627\u0633\u062a\u0627","title":"\u067e\u0627\u0633\u062a\u0627","image2":"images\/icons\/restaurant_pack\/noodles.svg","shop_id":1,"order":17,"meta_description":"\u067e\u0627\u0633\u062a\u0627","url":"pasta","activated":1,"google_index":1},{"id":21,"description":"\u0644\u0627\u0632\u0627\u0646\u06cc\u0627","title":"\u0644\u0627\u0632\u0627\u0646\u06cc\u0627","image2":"images\/icons\/restaurant_pack\/lasagna.svg","shop_id":1,"order":18,"meta_description":"\u0644\u0627\u0632\u0627\u0646\u06cc\u0627","url":"lazana","activated":1,"google_index":1},{"id":22,"description":"\u0642\u0647\u0648\u0647 \u06af\u0631\u0645 \u0628\u0627 \u0634\u06cc\u0631 \u06cc\u0627 \u062e\u0627\u0645\u0647 \u06a9\u0644\u0627\u0633\u06cc\u06a9","title":"\u0642\u0647\u0648\u0647 \u06af\u0631\u0645 \u0628\u0627 \u0634\u06cc\u0631 \u06cc\u0627 \u062e\u0627\u0645\u0647 \u06a9\u0644\u0627\u0633\u06cc\u06a9","image2":"images\/icons\/restaurant_pack\/hot-coffee-milk.svg","shop_id":1,"order":4,"meta_description":"\u0642\u0647\u0648\u0647 \u06af\u0631\u0645 \u0628\u0627 \u0634\u06cc\u0631 \u06cc\u0627 \u062e\u0627\u0645\u0647 \u06a9\u0644\u0627\u0633\u06cc\u06a9","url":"khoh-grm-ba-shr-a-khamh-klask","activated":1,"google_index":1},{"id":23,"description":"\u0633\u0627\u06cc\u0631 \u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0647\u0627\u06cc \u06af\u0631\u0645","title":"\u0633\u0627\u06cc\u0631 \u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0647\u0627\u06cc \u06af\u0631\u0645","image2":"images\/icons\/restaurant_pack\/coffe-cup.svg","shop_id":1,"order":5,"meta_description":"\u0633\u0627\u06cc\u0631 \u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0647\u0627\u06cc \u06af\u0631\u0645","url":"sar-noshdn-ha-grm","activated":1,"google_index":1}]';

        $gennaro_data = '[{"id":38,"description":"\u0627\u0633\u062a\u06cc\u06a9","title":"\u0627\u0633\u062a\u06cc\u06a9","image2":"images\/icons\/restaurant_pack\/steak.svg","shop_id":1,"order":1,"meta_description":"\u0627\u0633\u062a\u06cc\u06a9","url":"astk","activated":1,"google_index":1},{"id":39,"description":"\u063a\u0630\u0627\u06cc \u0627\u0635\u0644\u06cc","title":"\u063a\u0630\u0627\u06cc \u0627\u0635\u0644\u06cc","image2":"images\/icons\/restaurant_pack\/pot.svg","shop_id":1,"order":0,"meta_description":"\u063a\u0630\u0627\u06cc \u0627\u0635\u0644\u06cc","url":"ghtha-asl","activated":1,"google_index":1},{"id":40,"description":"\u067e\u0627\u0633\u062a\u0627","title":"\u067e\u0627\u0633\u062a\u0627","image2":"images\/icons\/restaurant_pack\/shrimp.svg","shop_id":1,"order":2,"meta_description":"\u067e\u0627\u0633\u062a\u0627","url":"pasta","activated":1,"google_index":1},{"id":41,"description":"\u063a\u0630\u0627\u06cc \u062f\u0631\u06cc\u0627\u06cc\u06cc","title":"\u063a\u0630\u0627\u06cc \u062f\u0631\u06cc\u0627\u06cc\u06cc","image2":"images\/icons\/restaurant_pack\/chicken.svg","shop_id":1,"order":3,"meta_description":"\u063a\u0630\u0627\u06cc \u062f\u0631\u06cc\u0627\u06cc\u06cc","url":"ghtha-dra","activated":1,"google_index":1},{"id":42,"description":"\u067e\u06cc\u062a\u0632\u0627","title":"\u067e\u06cc\u062a\u0632\u0627","image2":"images\/icons\/restaurant_pack\/pizza.svg","shop_id":1,"order":4,"meta_description":"\u067e\u06cc\u062a\u0632\u0627","url":"ptza","activated":1,"google_index":1},{"id":44,"description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","title":"\u067e\u06cc\u0634 \u063a\u0630\u0627","image2":"images\/icons\/restaurant_pack\/noodles.svg","shop_id":1,"order":5,"meta_description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","url":"psh-ghtha","activated":1,"google_index":1},{"id":45,"description":"\u0633\u0627\u0644\u0627\u062f","title":"\u0633\u0627\u0644\u0627\u062f","image2":"images\/icons\/restaurant_pack\/fruit.svg","shop_id":1,"order":6,"meta_description":"\u0633\u0627\u0644\u0627\u062f","url":"salad","activated":1,"google_index":1},{"id":46,"description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc","title":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc","image2":"images\/icons\/restaurant_pack\/sos.svg","shop_id":1,"order":7,"meta_description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc","url":"noshdn","activated":1,"google_index":1},{"id":56,"description":"\u0627\u0632 \u062c\u0646\u0627\u0631\u0648 \u0628\u06cc\u0634\u062a\u0631 \u0628\u062f\u0627\u0646\u06cc\u062f","title":"\u0627\u0632 \u062c\u0646\u0627\u0631\u0648 \u0628\u06cc\u0634\u062a\u0631 \u0628\u062f\u0627\u0646\u06cc\u062f","image2":"images\/icons\/restaurant_pack\/salver.svg","shop_id":1,"order":8,"meta_description":"\u0627\u0632 \u062c\u0646\u0627\u0631\u0648 \u0628\u06cc\u0634\u062a\u0631 \u0628\u062f\u0627\u0646\u06cc\u062f","url":"az-jnaro-bshtr-bdand","activated":1,"google_index":1}]';
        
        $fano_data = '[{"id":1,"description":"\u067e\u06cc\u062a\u0632\u0627","title":"\u067e\u06cc\u062a\u0632\u0627","image2":"images\/icons\/restaurant_pack\/pizza.svg","shop_id":1,"order":0,"meta_description":"\u067e\u06cc\u062a\u0632\u0627","url":"ptza","activated":1,"google_index":1},{"id":2,"description":"\u0627\u0633\u062a\u06cc\u06a9","title":"\u0627\u0633\u062a\u06cc\u06a9","image2":"images\/icons\/restaurant_pack\/steak.svg","shop_id":1,"order":1,"meta_description":"\u0627\u0633\u062a\u06cc\u06a9","url":"astk","activated":1,"google_index":1},{"id":3,"description":"\u062e\u0648\u0631\u0627\u06a9","title":"\u062e\u0648\u0631\u0627\u06a9","image2":"images\/icons\/restaurant_pack\/chicken.svg","shop_id":1,"order":2,"meta_description":"\u062e\u0648\u0631\u0627\u06a9","url":"khorak","activated":1,"google_index":1},{"id":4,"description":"\u067e\u0627\u0633\u062a\u0627","title":"\u067e\u0627\u0633\u062a\u0627","image2":"images\/icons\/restaurant_pack\/noodles.svg","shop_id":1,"order":3,"meta_description":"\u067e\u0627\u0633\u062a\u0627","url":"pasta","activated":1,"google_index":1},{"id":5,"description":"\u0628\u0631\u06af\u0631 \u0648 \u0633\u0627\u0646\u062f\u0648\u06cc\u0686","title":"\u0628\u0631\u06af\u0631 \u0648 \u0633\u0627\u0646\u062f\u0648\u06cc\u0686","image2":"images\/icons\/restaurant_pack\/hamburger.svg","shop_id":1,"order":4,"meta_description":"\u0628\u0631\u06af\u0631 \u0648 \u0633\u0627\u0646\u062f\u0648\u06cc\u0686","url":"brgr-o-sandoch","activated":1,"google_index":1},{"id":6,"description":"\u0633\u0627\u0644\u0627\u062f","title":"\u0633\u0627\u0644\u0627\u062f","image2":"images\/icons\/restaurant_pack\/salad.svg","shop_id":1,"order":5,"meta_description":"\u0633\u0627\u0644\u0627\u062f","url":"salad","activated":1,"google_index":1},{"id":7,"description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","title":"\u067e\u06cc\u0634 \u063a\u0630\u0627","image2":"images\/icons\/restaurant_pack\/soup.svg","shop_id":1,"order":6,"meta_description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","url":"psh-ghtha","activated":1,"google_index":1},{"id":8,"description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc","title":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc","image2":"images\/icons\/restaurant_pack\/beer.svg","shop_id":1,"order":7,"meta_description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc","url":"noshdn","activated":1,"google_index":1}]';

        $parla_data = '[{"id":1,"description":"\u0633\u0648\u067e","title":"\u0633\u0648\u067e","image2":"images\/icons\/restaurant_pack\/pot.svg","shop_id":1,"order":0,"meta_description":"\u0633\u0648\u067e","url":"sop","activated":1,"google_index":1},{"id":2,"description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","title":"\u067e\u06cc\u0634 \u063a\u0630\u0627","image2":"images\/icons\/restaurant_pack\/fruit.svg","shop_id":1,"order":1,"meta_description":"\u067e\u06cc\u0634 \u063a\u0630\u0627","url":"psh-ghtha","activated":1,"google_index":1},{"id":3,"description":"\u0633\u0627\u0644\u0627\u062f","title":"\u0633\u0627\u0644\u0627\u062f","image2":"images\/icons\/restaurant_pack\/salad.svg","shop_id":1,"order":2,"meta_description":"\u0633\u0627\u0644\u0627\u062f","url":"salad","activated":1,"google_index":1},{"id":4,"description":"\u067e\u06cc\u062a\u0632\u0627 \u0627\u06cc\u062a\u0627\u0644\u06cc\u0627\u06cc\u06cc","title":"\u067e\u06cc\u062a\u0632\u0627 \u0627\u06cc\u062a\u0627\u0644\u06cc\u0627\u06cc\u06cc","image2":"images\/icons\/restaurant_pack\/pizza.svg","shop_id":1,"order":3,"meta_description":"\u067e\u06cc\u062a\u0632\u0627 \u0627\u06cc\u062a\u0627\u0644\u06cc\u0627\u06cc\u06cc","url":"ptza-atala","activated":1,"google_index":1},{"id":5,"description":"\u063a\u0630\u0627\u06cc \u0627\u0635\u0644\u06cc","title":"\u063a\u0630\u0627\u06cc \u0627\u0635\u0644\u06cc","image2":"images\/icons\/restaurant_pack\/steak.svg","shop_id":1,"order":4,"meta_description":"\u063a\u0630\u0627\u06cc \u0627\u0635\u0644\u06cc","url":"ghtha-asl","activated":1,"google_index":1},{"id":6,"description":"\u0641\u0631\u0646\u06af\u06cc","title":"\u0641\u0631\u0646\u06af\u06cc","image2":"images\/icons\/restaurant_pack\/noodles.svg","shop_id":1,"order":5,"meta_description":"\u0641\u0631\u0646\u06af\u06cc","url":"frng","activated":1,"google_index":1},{"id":7,"description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0647\u0627","title":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0647\u0627","image2":"images\/icons\/restaurant_pack\/cocktail.svg","shop_id":1,"order":6,"meta_description":"\u0646\u0648\u0634\u06cc\u062f\u0646\u06cc \u0647\u0627","url":"noshdn-ha","activated":1,"google_index":1}]';

        foreach(json_decode($denja_data) as $category)
        {  
            Category::updateOrCreate(
                ['id' => 100 + $category->id],
                [
                    'shop_id' => 1,
                    'title' => $category->title,
                    'order' => $category->order,
                    'description' => $category->description,
                    'meta_description' => $category->meta_description,
                    'activated' => $category->activated,
                    'google_index' => $category->google_index,
                    'url' => $category->url,
                    'image' => asset($category->image2),
                ]
            );
        }

        foreach(json_decode($cinemacafe_data) as $category)
        {  
            Category::updateOrCreate(
                ['id' => 200 + $category->id],
                [
                    'shop_id' => 2,
                    'title' => $category->title,
                    'order' => $category->order,
                    'description' => $category->description,
                    'meta_description' => $category->meta_description,
                    'activated' => $category->activated,
                    'google_index' => $category->google_index,
                    'url' => $category->url,
                    'image' => asset($category->image2),
                ]
            );
        }

        foreach(json_decode($gennaro_data) as $category)
        {  
            Category::updateOrCreate(
                ['id' => 300 + $category->id],
                [
                    'shop_id' => 3,
                    'title' => $category->title,
                    'order' => $category->order,
                    'description' => $category->description,
                    'meta_description' => $category->meta_description,
                    'activated' => $category->activated,
                    'google_index' => $category->google_index,
                    'url' => $category->url,
                    'image' => asset($category->image2),
                ]
            );
        }

        foreach(json_decode($fano_data) as $category)
        {  
            Category::updateOrCreate(
                ['id' => 400 + $category->id],
                [
                    'shop_id' => 4,
                    'title' => $category->title,
                    'order' => $category->order,
                    'description' => $category->description,
                    'meta_description' => $category->meta_description,
                    'activated' => $category->activated,
                    'google_index' => $category->google_index,
                    'url' => $category->url,
                    'image' => asset($category->image2),
                ]
            );
        }

        foreach(json_decode($parla_data) as $category)
        {  
            Category::updateOrCreate(
                ['id' => 500 + $category->id],
                [
                    'shop_id' => 5,
                    'title' => $category->title,
                    'order' => $category->order,
                    'description' => $category->description,
                    'meta_description' => $category->meta_description,
                    'activated' => $category->activated,
                    'google_index' => $category->google_index,
                    'url' => $category->url,
                    'image' => asset($category->image2),
                ]
            );
        }
    }

    /**
     * Run the database seeds.
     */
    public function run2()
    {
        $shop_categories = [
            [
                'id' => 1,
                'title' => 'صبحانه',
                'image' => 'sausages.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 2,
                'title' => 'پیش غذا',
                'image' => 'soup.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 3,
                'title' => 'غذای اصلی',
                'image' => 'fast-food.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 4,
                'title' => 'اسموتی و ماکتل',
                'image' => 'cocktail.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 5,
                'title' => 'آبمیوه و شیک',
                'image' => 'fruit.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 12,
                'title' => 'شیرینی ها',
                'image' => 'cupcake.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 8,
                'title' => 'نوشیدنی و دسر',
                'image' => 'ice-cream.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 7,
                'title' => 'دمنوش',
                'image' => 'coffee-cup.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 6,
                'title' => 'قهوه',
                'image' => 'beer.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 10,
                'title' => 'چای ارگانیک لاهیجان',
                'image' => 'vegan.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 9,
                'title' => 'مخصوص دِنجا',
                'image' => 'cutlery.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 11,
                'title' => 'تست',
                'image' => 'no.svg',
                'shop_id' => 1,
            ],

            // [
            //     'id' => 13,
            //     'title' => 'آرشیو مناسبتها',
            //     'image' => 'no.svg',
            //     'shop_id' => 1,
            // ],

            // cofe cinema
            [
                'id' => 14,
                'title' => 'صبحانه',
                'image' => 'sausages.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 15,
                'title' => 'پیتزا',
                'image' => 'pizza2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 16,
                'title' => 'ساندویچ و پنینی',
                'image' => 'hamburger2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 17,
                'title' => 'گریل',
                'image' => 'steak2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 18,
                'title' => 'لازانیا و گراتین',
                'image' => 'cake2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 19,
                'title' => 'پلوی مخلوط',
                'image' => 'pot2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 20,
                'title' => 'پاستا',
                'image' => 'noodles2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 21,
                'title' => 'منوی روز',
                'image' => 'vegetarian-food2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 22,
                'title' => 'پیش غذا',
                'image' => 'salver2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 23,
                'title' => 'فیتنس',
                'image' => 'carrot2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 24,
                'title' => 'سوپ و سالاد',
                'image' => 'soup2.svg',
                'shop_id' => 2,
            ],
        ];

        $this->saveTree($shop_categories, null);
    }

    public function saveTree($categories, $parent)
    {
        $order = 0;
        foreach($categories as $category)
        {
            $order ++;
            $node = Category::updateOrCreate(
                ['id' => $category['id']],
                [
                    'title' => $category['title'],
                    'image' => asset('images/icons/restaurant_pack/' . $category['image']),
                    'shop_id' => $category['shop_id'],
                    'order' => $order,
                    'description' => $category['title'],
                    'meta_description' => $category['title'],
                    'url' => Str::slug($category['title']),
                    'activated' => $category['id'] === 11 ? 0 : 1,
                    'google_index' => 1,
                ]
            );

            if(isset($parent)){
                $parent->appendNode($node);
            }
            if(isset($category['children'])){
                $this->saveTree($category['children'], $node);
            }
        }
    }
}


// INSERT INTO `folders` (`id`, `name`, `description`, `image`, `status`, `tag`, `level`, `parent_id`, `user_id`, `sort`, `created_at`, `updated_at`) VALUES
// (1, 'صبحانه', NULL, 'sausages.svg', 'incomplete', NULL, 'batch', NULL, NULL, 1, '2018-06-21 15:05:12', '2019-06-11 19:20:54'),
// (2, 'پیش غذا', NULL, 'soup.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 2, '2019-03-09 12:56:54', '2019-06-11 19:20:54'),
// (3, 'غذای اصلی', NULL, 'fast-food.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 3, '2019-03-09 12:59:40', '2019-06-11 19:20:54'),
// (4, 'اسموتی و ماکتل', NULL, 'cocktail.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 4, '2019-03-09 13:00:06', '2019-06-11 19:20:54'),
// (5, 'آبمیوه و شیک', NULL, 'fruit.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 5, '2019-03-09 13:05:49', '2019-06-11 19:20:54'),
// (6, 'قهوه', NULL, 'beer.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 8, '2019-03-09 13:06:12', '2019-06-11 19:20:54'),
// (7, 'دمنوش', NULL, 'coffee-cup.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 7, '2019-03-09 13:06:44', '2019-06-11 19:20:54'),
// (8, 'نوشیدنی و دسر', NULL, 'cupcake.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 6, '2019-03-09 13:08:14', '2019-06-11 19:20:54'),
// (9, 'مخصوص دِنجا', NULL, 'cutlery.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 0, '2019-03-09 13:10:32', '2019-06-11 19:20:54'),
// (10, 'چای ارگانیک لاهیجان', NULL, 'vegan.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 9, '2019-03-10 08:53:29', '2019-06-11 19:20:54'),
// (12, 'شیرینی ها', NULL, NULL, 'Incomplete', NULL, 'batch', NULL, NULL, 10, '2019-05-14 07:44:08', '2019-06-11 19:20:54'),
// (11, 'تست', NULL, NULL, 'archive', NULL, 'batch', NULL, NULL, 10, '2019-04-20 15:39:28', '2019-04-21 14:18:19'),
// (13, 'آرشیو مناسبتها', NULL, NULL, 'Incomplete', NULL, 'batch', NULL, NULL, 11, '2019-05-31 07:01:10', '2019-06-11 19:20:54');



        // $types =[
     //     ['id' => 1, 'name' => 'پیتزا'],
     //     ['id' => 2, 'name' => 'سانویچ'],
     //        ['id' => 3, 'name' => 'سوخاری'],
     //        ['id' => 4, 'name' => 'برگر'],
     //        ['id' => 5, 'name' => 'نودل'],
     //        ['id' => 6, 'name' => 'گریل'],
     //        ['id' => 7, 'name' => 'مرغ بریان'],
     //        ['id' => 8, 'name' => 'استیک'],
     //        ['id' => 9, 'name' => 'پاستا'],
     //        ['id' => 10, 'name' => 'کباب'],
     //        ['id' => 11, 'name' => 'خورشت'],
     //        ['id' => 12, 'name' => 'دریایی'],
     //        ['id' => 13, 'name' => 'سنتی'],
     //        ['id' => 14, 'name' => 'محلی'],
     //        ['id' => 15, 'name' => 'پلویی'],
     //        ['id' => 16, 'name' => 'دیزی'],
     //        ['id' => 17, 'name' => 'گیلکی'],
     //        ['id' => 18, 'name' => 'خانگی'],
     //        ['id' => 19, 'name' => 'آسیایی'],
     //        ['id' => 20, 'name' => 'بشقاب'],
     //        ['id' => 21, 'name' => 'لازانیا'],
     //        ['id' => 22, 'name' => 'خوراک'],
     //        ['id' => 23, 'name' => 'صبحانه'],
     //        ['id' => 24, 'name' => 'کله‌پاچه'],
     //        ['id' => 25, 'name' => 'نان'],
     //        ['id' => 26, 'name' => 'بستنی'],
     //        ['id' => 27, 'name' => 'آب‌میوه'],
     //        ['id' => 28, 'name' => 'غذای اصلی'],
     //        ['id' => 29, 'name' => 'بین المللی'],
     //        ['id' => 30, 'name' => 'سالاد'],
     //        ['id' => 31, 'name' => 'دسر'],
     //        ['id' => 32, 'name' => 'پیش‌غذا'],
     //        ['id' => 33, 'name' => 'نوشیدنی'],
        // ];

     //    $blog_categories = [
     //        [
     //            'id' => 1,
     //            'title' => 'فست فود',
     //            'image' => '',
     //            'children' => [
     //                ['id' => 2, 'title' => 'پیتزا'],
     //                ['id' => 3, 'title' => 'سانویچ'],
     //                ['id' => 4, 'title' => 'سوخاری'],
     //                ['id' => 5, 'title' => 'برگر'],
     //            ],
     //        ],
     //    ];

        // $this->saveTree($blog_categories, null);
