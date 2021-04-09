require('./bootstrap');


document.querySelector('.image-picker input')
.addEventListener('change', (e)=> {
    // ここに画像が選択された時の処理を記載する

    // 画像を読みこむ方法

    // e.target はクリックされた <li> 要素を参照します
    const input = e.target;
    console.log(input);
    const reader = new FileReader();

    reader.onload = (e) => {
        // ここに、画像を読み込んだ後の処理を記述する
        //読み込んだ画像をimgタグに表示する
        input.closest('.image-picker').querySelector('img').src = e.target.result
    }
    // 第一引数はinputタグのDOMのfilesフィールドに格納されている、Fileオブジェクトを指定している
    reader.readAsDataURL(input.files[0]);
});
