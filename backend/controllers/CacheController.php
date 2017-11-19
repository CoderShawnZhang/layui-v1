<?php
/**
 * Yii2.0--缓存
 * User: anlewo0208
 * Date: 2017/11/6
 * Time: 下午5:52
 */

namespace backend\controllers;

use Yii;
class CacheController extends BaseController
{
    protected $key = 'test';

    public function actionIndex()
    {

        echo phpinfo();die;
        $cache = Yii::$app->cache;
        $data = $cache->get('abc');
        if($data == false){
            $cache->set('abc','999');
        }
        var_dump($cache->get('abc'));
        return $this->render('index');
    }

    /**
     * 写入键值缓存
     */
    public function actionWriteredis()
    {
        $error = [];
        $post  = Yii::$app->request->post();
        Yii::$app->redis->set($this->key, $post['redistxt']);
        return $this->render('index', ['error' => $error]);
    }

    /**
     * 读取键值缓存
     */
    public function actionReadredis()
    {
        return $this->render('index', ['keys' => Yii::$app->redis->get($this->key)]);
    }

    /**
     * 删除键值缓存
     */
    public function actionDelredis()
    {
        Yii::$app->redis->del($this->key);

        return $this->render('index', ['keys' => Yii::$app->redis->get($this->key)]);
    }

    /**
     * 查看所有的键
     */
    public function actionShowredis(){

        $data = [];
        $page = Yii::$app->request->get();
        $cur_page = isset($page['page'])?$page['page']:1;

        $RedisList = Yii::$app->redis->keys('*');
        $list = array_chunk($RedisList,8,$cur_page);
$i = 0;
        foreach ($list[$cur_page-1] as $key => $val){

            try {
                if(Yii::$app->redis->hlen($val) > 0){

                }
                if ( ! Yii::$app->redis->exists($val)) {
                    $str = uniqid(mt_rand(), 1);
                    Yii::$app->redis->set($val, sha1($str));
                }

                $i++;
                $t          = Yii::$app->redis->get($val);
                $redisValue = isset($t) ? $t : '';
                $data[]     = ['id' => $key, 'redisKey' => $val, 'redisValue' => $redisValue];
            }catch (\Exception $e){
                var_dump($e->getMessage());
            }
        }


        $data = ['code'=>0,'msg'=>'','count'=>count($RedisList),'data'=>$data];
        return json_encode($data);
    }
}