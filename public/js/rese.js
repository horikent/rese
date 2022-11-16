const target = document.getElementById("menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
  const nav = document.getElementById("nav");
  nav.classList.toggle('in');
});

document.addEventListener('change', e => {
  if(e.target.matches('[name=date]')){
    document.querySelector('#output_date').textContent=e.target.value;
  }
});

document.addEventListener('change', e => {
  if(e.target.matches('[name=time]')){
    document.querySelector('#output_time').textContent=e.target.value;
  }
});

document.addEventListener('change', e => {
  if(e.target.matches('[name=number]')){
    document.querySelector('#output_number').textContent=e.target.value+"人";
  }
});

const reviewBtn = document.getElementById('reviewBtn');
const closeBtn = document.getElementById('closeBtn');
const modal = document.getElementById('modal');
reviewBtn.addEventListener('click', () => {
modal.style.display = 'block';
})
closeBtn.addEventListener('click', () => {
modal.style.display = 'none';
})
window.addEventListener('click', (e) => {
if (!e.target.closest('.modal__content-inner') && e.target.id !== "reviewBtn") {
modal.style.display = 'none';
}
});

const maxStar = 5;
app.get("/", (req, res) => {
  const sql = "select * from book";
  connection.query(sql, function (err, result, fields) {
    if (err) throw err;
    books = [];
    for (book of result) {
      book.colored = book.good;  // 評価の数（オレンジ色の星の数）
      book.uncolored = maxStar - book.good;  // 灰色の星の数
      books.push(book);
    }
    res.render("index", { book: books }); 
  });
});
