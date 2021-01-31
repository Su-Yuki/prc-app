// IDを指定して要素を取得
// let blueEl = document.getElementById('blue');
// console.log(blueEl);

// CLASSを指定して要素を取得
// document.getElementsByClassName('class名')
// let greenEl = document.getElementsByClassName('green');
// console.log(greenEl);

// タグ名を指定して要素を取得
// document.getElementsByTagName('タグ名');

// let liEl = document.getElementsByTagName('li');
// console.log(liEl);

// let red = document.getElementById('red');
// let ul = red.parentElement;
// console.log(ul);

// let box = document.getElementById('box');
// console.log(box);

// let blueEl = document.getElementById('blue');
// // テキストを取得
// let text = blueEl.textContent;
// console.log(text);

// // テキストを変更
// blueEl.textContent = '青';

// blueEl.style.color = 'blue';

// blueEl.classList.add('blue');


// let input = document.querySelector('#input-text');

// // 入力欄の値を変更
// input.value = "test";

// // 入力欄の値を取得
// console.log(input);


// イベントの登録
// イベントを登録する際にやることは大きくわけると3つだけです。

// イベントを登録する要素を取得する
// document.querySelector etc
// イベントを登録
// addEventListener
// イベントの内容を書く
// 文字の色を変更
// テキストを変更
// アラートを表示

let text = document.querySelector('#input-text');
text.addEventListener('click', function () {
  this.style.color = 'blue';
  this.style.fontSize = '40px';
})

text.addEventListener('mouseover', function () {
  this.style.color = 'pink';
  this.style.fontSize = '20px';
})

text.addEventListener('mouseleave', function () {
  this.style.color = '';
})

let input = document.querySelector('#input-text');
input.addEventListener('change', function () {
  console.log(this.value);
  alert('入力欄が変更されました');
})

let btn = document.querySelector('#btn');
console.log(btn);

btn.addEventListener('click', function () {
  text.textContent = input.value;
})