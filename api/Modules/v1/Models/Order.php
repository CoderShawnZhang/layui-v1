<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/8
 * Time: 上午9:47
 */

namespace api\Modules\v1\Models;


use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%orders}}";
    }

    public function rules()
    {
        return [
            [['vendorCode'], 'required'],
            [['orderSn'], 'unique'],
            [['orderSn', 'orderType', 'earnestState', 'orderState', 'isDel', 'orderFrom', 'finnshedTime', 'salesId',
                'created', 'modified', 'isPurchases', 'relationOrdersSn', 'orderBusinessType', 'purchasesType', 'orderBusinessType'], 'integer'],
            [['orderAmount', 'earnest', 'discount', 'customDiscountAmount', 'subOrderCount'], 'number'],
            [['orderCommand', 'vendorCode', 'buyerMobile'], 'string', 'max' => 20],
            [['buyerName', 'creater', 'modifier'], 'string', 'max' => 24],
            [['orderStateLog'], 'string', 'max' => 2000],
            [['discountReason'], 'string', 'max' => 500],
            [['deliveryAddress', 'isPurchases'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'orderId' => '订单索引id',
            'orderSn' => '门店单号',
            'pId' => '父订单ID',
            'kind' => '订单类型（0：正常；1：补货；2：重提）',
            'orderCommand' => '订单口令',
            'vendorCode' => '加盟商编号',
            'buyerName' => '买家姓名',
            'buyerMobile' => '买家手机',
            'orderType' => '订单类型',
            'orderAmount' => '订单总价格',
            'discount' => '折扣',
            'discountReason' => '折扣原因',
            'customDiscountAmount' => '客户折扣金额',
            'earnest' => '订单定金',
            'earnestState' => '定金状态，0待付，1已付',
            'orderState' => '订单状态',
            'orderStateLog' => '订单状态信息',
            'isDel' => '删除状态:0未删除，1删除',
            'orderFrom' => '1PC,2Ipad,3Terminal',
            'finnshedTime' => '订单完成时间',
            'subOrderCount' => '子订单总任务数',
            'finishSubCount' => '完成的任务数',
            'salesId' => '导购id',
            'deliveryAddress' => '收货地址',
            'creater' => '创建人',
            'created' => '创建时间',
            'modifier' => '修改人',
            'modified' => '修改时间',
            'isPurchases' => '是否已采购 0：否 1：是',
            'relationOrdersSn' => '关联主材包',
            'orderBusinessType' => '主材包业务',
            'purchasesType' => '采购类型',
        ];
    }
}