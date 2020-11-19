<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $helloWorld = 'Hello World';
    return view('welcome', compact('helloWorld'));
});

Route::get('/model', function () {
    //$products = \App\Product::all(); // select * from products

    // Forma chamada Active Record

    //$user = new \App\User();
    // $user = \App\User::find(81);
    // $user->name = 'Usuario Teste Editado';
    // $user->save();

    //return;
    // Retorna todos os usuários
    // return \App\User::all();  // Retorna uma Collection
    // \App\User::find(81); // retorna um usuário
    //return \App\User::where('name', 'Ismael Marks')->get(); // select* from users where name='Ismael Marks'

    // return \App\User::paginate(10); - paginar dados com Laravel



    // Mass Assignment - atribuição em massa

    // $user = \App\User::create([
    // 'name' => 'Nanderson',
    // 'email' => 'email100@email.com',
    // 'password' => bcrypt('123')
    // ]);
    // dd($user);


    //Mass Updade

    // $user = \App\User::find(82);
    // $user->update([
    //     'name'=>'Atualizando com mass update'
    // ]); // true ou false

    // dd($user);



    //Como eu faria para  pegar a loja de um usuário ?

    //$user = \App\User::find(4);

    //dd($user->store()->count()); // O objeto único(Store) se for muitos para muitos retorna Collection de Dados(Objetos)

    //Pegar os produtos de uma loja ?

    // $loja = \App\Store::find(1);
    //  return $loja->products(); \\ $loja->products()->where('id', 9)->get();

    //Pegar as lojas de uma categoria de uma loja ?

    // $categoria = \App\Category::find(1);
    // $categoria->products;

    //Criar uma loja para um usuário

    // $user = \App\User::find(10);
    // $store = $user->store()->create([
    // 'name' => 'Loja Teste',
    // 'description' => 'Loja teste de produtos de informática',
    // 'mobile_phone' => 'XX-XXXXX-XXXX',
    // 'phone' => 'XX-XXXXX-XXXX',
    // 'slug' => 'loja-teste'
    // ]);



    // Criar um produto para uma loja
    // $store = \App\Store::find(41);
    // $product = $store->products()->create([
    //     'name' => 'Notebook Dell',
    //     'description' => 'CORE I5 10GB',
    //     'body' => 'Qualquer coisa',
    //     'price' => '2999.90',
    //     'slug'=> 'notebook-dell',
    // ]);
    // dd($product);


    // Criar uma categoria


    // \App\Category::create([
    // 'name' => 'Games',
    // 'slug' => 'games'
    // ]);

    // \App\Category::create([
    //     'name' => 'Notebooks',
    //     'slug' => 'notebooks'
    //     ]);

    // return \App\Category::all();


    //Adicionar um produto para uma categoria ou vice-versa

    // $product = \App\Product::find(1);
    // dd($product->categories()->sync([1,2]));

    $product = \App\Product::find(1);

    return $product->categories;
});



//Laravel responde diretamente para as rotas
//Route::get
//Route::post
//Route::put
//Route::patch
//Route::delete
//Route::options



//Organização de rotas:
// prefixo, namespace

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    
    //Route::prefix('stores')->name('stores.')->group(function () {


    //     Route::get('/', 'StoreController@index')->name('index');
    //     Route::get('/create', 'StoreController@create')->name('create');
    //     Route::post('/store', 'StoreController@store')->name('store');
    //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
    //     Route::post('/update/{store}', 'StoreController@update')->name('update');
    //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');

    // });

    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');


    
});
