<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;

class Shop extends Model implements Commentable
{
    use SoftDeletes;
    use Taggable;
    use HasComments;

    public $guarded = [];

    // open time , theme, theme color
    // 'کافه نان دِنجا', 'Denja Bakery Café'

    // title, 
    // url,
    // email,
    // logo,
    // cover_image,
    // favicon,
    // activated,
    // address,
    // country,
    // city,
    // postal_code,
    // mobile,
    // phone,
    // fax,
    // twitter,
    // telegram,
    // instagram,
    // skype,
    // description,
    // content,
    // meta_description,
    // keywords,
    // tags,
    // gallery,
    
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:60|min:5|unique:shops,title,',
            'help' => 'Title should be unique, minimum 5 and maximum 60 characters.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'database' => 'unique',
            'rule' => 'required|max:80|unique:shops,url,',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'email',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|unique:shops,email,',
            'help' => '',
            'form_type' => 'email',
            'table' => true,
        ],
        [
            'name' => 'logo',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Should have rate 1*1',
            'form_type' => 'image',
            'table' => false,
        ],
        [
            'name' => 'cover_image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Should have rate 3*1',
            'form_type' => 'image',
            'table' => false,
        ],
        [
            'name' => 'favicon',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'maximum 60*60 pixels',
            'form_type' => 'image',
            'table' => false,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => '', // switch-m
            'table' => false,
        ],
        [
            'name' => 'address',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => 'Specify street and building number',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'country',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'city',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'postal_code',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'mobile',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'phone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'fax',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'twitter',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'facebook',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'skype',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'instagram',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'telegram',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'description',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Description will show in lists instead of content.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'content',
            'type' => 'text',
            'database' => '',
            'rule' => 'required|seo_header',
            'help' => '',
            'form_type' => 'ckeditor',
            'table' => true,
        ], 
        [
            'name' => 'meta_description',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:191|min:30',
            'help' => 'Meta description should have minimum 30 and maximum 191 characters.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'keywords',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Its not important for google anymore',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'tags',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Tag',
            'property' => 'name',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function canBeRated(): bool
    {
        return true;
    }

    public function mustBeApproved(): bool
    {
        return true; // default false
    }
            
    public function getColumns()
    {
        return $this->columns;
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }

    // public function createStore(){
    //     $this->mysqldbName = $this->_createMysqldbName($this->nameEn);
    //     // make folder for statics
    //     FileHelper::createDirectory(\Yii::getAlias('@statics/web/').$this->nameEn);
    //     // todo: set dns and subdomain for statics

    //     $storeFile = \Yii::getAlias('@stores/').$this->nameEn;
    //     // copy base code
    //     FileHelper::copyDirectory(\Yii::getAlias('@mainStores/store-base-codes'), $storeFile);

    //     // change some variables in stores
    //     $indexFile = $storeFile.'/index.php';
    //     file_put_contents($indexFile,str_replace(':storeName', $this->nameEn, file_get_contents($indexFile)));
    //     file_put_contents($indexFile,str_replace(':mysqldbName', $this->mysqldbName, file_get_contents($indexFile)));
    //     $migrationFile = $storeFile.'/components/Migration.php';
    //     file_put_contents($migrationFile,str_replace(':db', $this->mysqldbName, file_get_contents($migrationFile)));

    //     $configFile = $storeFile.'/config/main.php';
    //     $configFileStr = file_get_contents($configFile);
    //     $configFileStr = str_replace(':storeName', $this->nameEn, $configFileStr);
    //     $configFileStr = str_replace(':cookie', \Yii::$app->security->generateRandomString(), $configFileStr);
    //     file_put_contents($configFile, $configFileStr);

    //     // todo: install theme && insert settings to store

    //     // inja function change theme o bezan ke monaseb ba type khodesh theme bezane

    //     FileHelper::copyDirectory(\Yii::getAlias('@mainStores/themes/basic/views'), $storeFile.'/themes/basic');
    //     FileHelper::copyDirectory(\Yii::getAlias('@mainStores/themes/basic/bundle'), \Yii::getAlias('@statics/web/').$this->nameEn.'/bundle');
    //     $this->imageSizes = [
    //         ['type'=>'brand', 'sizes' => [
    //             ["width"=>200, "height"=>100, "isConvert"=>1, "convertQuality"=>91, 'type' => Image::TYPE_BASE],
    //             ["width"=>100, "height"=>50, "isConvert"=>1, "convertQuality"=>91]
    //         ]],
    //         ['type'=>'product', 'sizes' => [
    //             ["width"=>200, "height"=>200, "isConvert"=>1, "convertQuality"=>91, 'type' => Image::TYPE_BASE],
    //             ["width"=>75, "height"=>75, "isConvert"=>1, "convertQuality"=>91],
    //             ["width"=>400, "height"=>400, "isConvert"=>1, "convertQuality"=>91],
    //         ]]
    //     ];
        
    //     $this->save(false);

    //     // todo: set database mysql&mongodb and create index
    //     \Yii::$app->db->createCommand('CREATE DATABASE `'.$this->mysqldbName.'` CHARACTER SET utf8 COLLATE utf8_general_ci')->execute();

    //     $root = \Yii::getAlias('@root');
    //     \Yii::info("cd $root && echo yes | yii migrate --db=migrationDb --migrationPath=$storeFile/migrations --migrationTable=migration_{$this->mysqldbName}", "command");
    //     $e = exec("cd $root && echo yes | yii migrate --db=migrationDb --migrationPath=$storeFile/migrations --migrationTable=migration_{$this->mysqldbName}");
    //     \Yii::info($e, "migration");

    //     // todo: set dns and subdoamin for store
    //     exec("php -q /home/faridsh/domains/sangsite.ir/add_subdomain.php $this->nameEn");

    // }
}
