<?php
return [
	/*
    |--------------------------------------------------------------------------
    | 默认权限配置
    |--------------------------------------------------------------------------
    |
    | 这个配置控制了数据权限和路由权限的数据源
    |
    */
	'defaults'=>[
		'router'=>'shopadmin',
		'data' => App\User::class,
	],
	'data' => [
		App\User::class => [
			App\Models\Entity\Goods::class => [
				'name'=>'商品',
				'permissions' => [
					'all'    => ['name'=>'全部','type'=>'all'],
					'creater'=> ['name'=>'自己创建','type'=>'field','field'=>'cat_id'],
					'shop_id'=> ['name'=>'指定店铺','type'=>'model','field'=>'shop_id','model'=>App\Shop::class],
					'cat_id' => ['name'=>'指定分类','type'=>'func','field'=>'cat_id','func'=>[App\Shop::class,'getId',[1,2]]],
				]
			],
		],
		
		
	],
	'router'=>[
		'shopadmin'=>[
			[	
				'group'=>'用户',
				'permissions'=>[
					'users.list' =>   ['name'=>'用户列表','routes'=>['users.index'] ],
					'users.add' =>    ['name'=>'用户新增','routes'=>['users.create','users.store'] ],
					'users.deteil' => ['name'=>'用户详情','routes'=>['users.show'] ],
					'users.update' => ['name'=>'用户编辑','routes'=>['users.edit','users.update']],
					'users.delete' => ['name'=>'用户删除','routes'=>['users.destroy']],
				],
			],
			// [	
			// 	'group'=>'角色',
			// 	'permissions'=>[
			// 		'roles.list' =>   ['name'=>'角色列表','routes'=>['roles.index'] ],
			// 		'roles.add' =>    ['name'=>'角色新增','routes'=>['roles.create','roles.store'] ],
			// 		'roles.deteil' => ['name'=>'角色详情','routes'=>['roles.show'] ],
			// 		'roles.update' => ['name'=>'角色编辑','routes'=>['roles.edit','roles.update']],
			// 		'roles.delete' => ['name'=>'角色删除','routes'=>['roles.destroy']],
			// 	]
			// ],
			// [	
			// 	'group'=>'店铺',
			// 	'permissions'=>[
			// 		'shop.list' =>   ['name'=>'角色列表','routes'=>['shop.index'] ],
			// 		'shop.add' =>    ['name'=>'角色新增','routes'=>['shop.create','shop.store'] ],
			// 		'shop.deteil' => ['name'=>'角色详情','routes'=>['shop.show'] ],
			// 		'shop.update' => ['name'=>'角色编辑','routes'=>['shop.edit','shop.update']],
			// 		'shop.delete' => ['name'=>'角色删除','routes'=>['shop.destroy']],
			// 	]
			// ],
			[	
				'group'=>'商品',
				'permissions'=>[
					'goods.list' =>   ['name'=>'商品列表','routes'=>['goods.index'] ],
					'goods.add' =>    ['name'=>'商品新增','routes'=>['goods.create','goods.store'] ],
					'goods.deteil' => ['name'=>'商品详情','routes'=>['goods.show'] ],
					'goods.update' => ['name'=>'商品编辑','routes'=>['goods.edit','goods.update']],
					'goods.delete' => ['name'=>'商品删除','routes'=>['goods.destroy']],
				],
				'models'=>[
					App\Models\Entity\Goods::class
				],
			],
			[	
				'group'=>'代码生成',
				'permissions'=>[
					'admin.generator.create' =>   [
						'name'=>'代码创建',
						'routes'=>['admin.generator.new','admin.generator.post'] 
					],
					'admin.generator.list' =>    [
						'name'=>'代码列表',
						'routes'=>['admin.generator.index'] 
					],
					'admin.generator.edit' => [
						'name'=>'角色编辑',
						'routes'=>['admin.generator.edit','admin.generator.post']
					],
					
				]
			],
		],
	],
];