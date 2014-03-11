<?php

/**
 * This is the model class for table "log_user".
 *
 * The followings are the available columns in table 'log_user':
 * @property integer $ID
 * @property string $IP_address
 * @property string $Waktu
 * @property string $Status
 * @property integer $UserID
 *
 * The followings are the available model relations:
 * @property User $user
 */
class LogUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LogUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IP_address, Waktu, UserID', 'required'),
			array('UserID', 'numerical', 'integerOnly'=>true),
			array('IP_address', 'length', 'max'=>15),
			array('Status', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, IP_address, Waktu, Status, UserID', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'UserID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'IP_address' => 'Ip Address',
			'Waktu' => 'Waktu',
			'Status' => 'Status',
			'UserID' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('IP_address',$this->IP_address,true);
		$criteria->compare('Waktu',$this->Waktu,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('UserID',$this->UserID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}