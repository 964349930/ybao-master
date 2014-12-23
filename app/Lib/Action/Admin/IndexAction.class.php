<?php
class IndexAction extends AdminAction
{
    public function index()
    {
        $this->assign('channel', $this->_getChannel());
        $this->assign('menu',    $this->_getMenu());
        $this->display();
    }

    public function main()
    {
        echo 'hello';
        $this->display();
    }

    protected function _getChannel() {
        return array(
            'index'   => '后台管理',
        );
    }

    protected function _getMenu() {
        $menu = array();
        $menu['index'] = array(
            '系统信息' => array(
                '修改密码' => U('Settings/pwd'),
            ),
            '用户管理' => array(
                '用户列表' => U('Users/ls'),
            ),
            '机构管理' => array(
                '机构列表' => U('Shops/ls'),
            ),
            '订单管理' => array(
                '订单列表' => U('Orders/ls'),
            ),
            '圈子管理' => array(
                '圈子列表' => U('Circles/groupList'),
                '话题列表' => U('Circles/articleList'),
            ),
            '幻灯片管理' => array(
                '分组列表' => U('Banners/groupList'),
                '幻灯片列表' => U('Banners/bannerList'),
            )
        );
        return $menu;
    }
}