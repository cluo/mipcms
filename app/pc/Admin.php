<?php
//MIPCMS.Com [Don't forget the beginner's mind]
//Copyright (c) 2017~2099 http://MIPCMS.Com All rights reserved.
namespace app\pc;
use mip\AdminBase;
class Admin extends AdminBase
{
	protected $beforeActionList = ['start'];

    public function start() { 
    }
    public function index() {
        $this->assign('todayUserCount',db('Users')->where('reg_time','>',strtotime(date('Y-m-d')))->count());
        $this->assign('yesterdayUserCount',db('Users')->where('reg_time>'.strtotime(date('Y-m-'.(date('d')-1))).' AND reg_time<'.strtotime(date('Y-m-d')))->count());//写完后 自己都看不懂了。。。
        $this->assign('allUserCount',db('Users')->count());
        return $this->fetch('pc@admin/index');
    }
    public function setting() {
        $templateDir = opendir(ROOT_PATH . 'template');
        if ($templateDir) {
            while (false !== ($file = readdir($templateDir))) {
                if (substr($file, 0, 1) != '.' AND is_dir(ROOT_PATH . 'template/' . $file)) {
                    $dirs[] = $file;
                }
            }
            closedir($templateDir);
        }
        $templateArray = array();
        foreach ($dirs as $key => $val) {
            $templateArray[] = $val;
        }
        $this->assign('templateArray',json_encode($templateArray));
        return $this->fetch('pc@admin/setting');
    }
    public function user() {
        return $this->fetch('pc@admin/user');
    }
    public function article() {
        return $this->fetch('pc@admin/article');
    }
    
    public function role() {
        return $this->fetch('pc@admin/role');
    }
    
    public function role_authorization() {
        return $this->fetch('pc@admin/role_authorization');
    }
    
    public function spider() {
        return $this->fetch('pc@admin/spider');
    }
    
    public function update() {
        return $this->fetch('pc@admin/update');
    }
    
    public function friendlink() {
        return $this->fetch('pc@admin/friendlink');
    }
    
    public function article_setting() {
        return $this->fetch('pc@admin/articleSetting');
    }
    
    public function data() {
        return $this->fetch('pc@admin/data');
    }
}