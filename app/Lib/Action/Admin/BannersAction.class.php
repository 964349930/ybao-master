<?php
class BannersAction extends AdminAction
{
    public function bannerList()
    {
        $list = D('Banners')->order('group_id')->select();
        foreach($list as $k=>$v){
            $list[$k]['group'] = D('BannersGroup')->where('id='.$v['group_id'])->getField('title');
        }
        $this->assign('list', $list);
        $this->display();
    }

    public function addBanner()
    {
        $list = D('BannersGroup')->select();
        $this->assign('list', $list);
        $this->display();
    }

    public function doAddBanner()
    {
        $data = $_POST;
        if(!empty($_FILES['pic']['name'])){
            $picList = uploadPic();
            if($picList['code'] != 'error'){
                $data['img'] = $picList['pic']['savename'];
            }
        }
        $result = D('Banners')->add($data);
        if($result){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }

    public function editBanner()
    {
        $id = intval($_GET['id']);
        $list = D('BannersGroup')->select();
        $info = D('Banners')->where('id='.$id)->find();
        $this->assign('info', $info);
        $this->assign('list', $list);
        $this->display();
    }

    public function doEditBanner()
    {
        $data = $_POST;
        if(!empty($_FILES['pic']['name'])){
            $picList = uploadPic();
            if($picList['code'] != 'error'){
                $data['img'] = $picList['pic']['savename'];
            }
        }
        $result = D('Banners')->save($data);
        if($result){
            $this->success('更新成功');
        }else{
            $this->error('更新失败');
        }
    }

    public function groupList()
    {
        $list = D('BannersGroup')->select();
        $this->assign('list', $list);
        $this->display();
    }

    public function doAddGroup()
    {
        $data = $_POST;
        $result = D('BannersGroup')->add($data);
        if($result){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }

    public function editGroup()
    {
        $id = intval($_GET['id']);
        $info = D('BannersGroup')->where('id='.$id)->find();
        $this->assign('info', $info);
        $this->display();
    }

    public function doEditGroup()
    {
        $data = $_POST;
        $result = D('BannersGroup')->save($data);
        if($result){
            $this->success('更新成功');
        }else{
            $this->error('更新失败');
        }
    }
}