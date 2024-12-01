
<?php
class Share
{

    public static function getMenu()
    {
        //Thêm file model menu
        require_once BASE_PATH . '/app/models/Menu.php';
        //Khởi tạo model menu
        $menu = new Menu();
        //Tạo menu Lv1
        $menul1 =  $menu->getMenuL1();
        $html = "";


        foreach ($menul1 as $i) {
            $menuChild = $menu->getMenuChild(['idCha' => $i['id']]);

            if (empty($menuChild)) {

                $html .= '<li><a href="/shop-php/index.php?con=ProductController&act=index&cat=' . $i['idCat'] . '">' . $i['ten'] . '</a></li>';
            } else {

                $html .= '<li><a href="#">' . $i['ten'] . '</a>'
                    . '<ul class="header__menu__dropdown">';


                foreach ($menuChild as $ii) {
                    $html .= '<li><a href="/shop-php/index.php?con=ProductController&act=index&cat=' . $ii['idCat'] . '">' . $ii['ten'] . '</a></li>';
                }

                $html .= '</ul></li>';
            }
        }
        return $html;
    }
}

?>