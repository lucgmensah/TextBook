const articles = document.querySelectorAll('article');
let currentArticleIndex = 0;

function showNextArticle() {
    articles[currentArticleIndex].classList.remove('show');
    currentArticleIndex = (currentArticleIndex + 1) % articles.length;
    articles[currentArticleIndex].classList.add('show');
}

setInterval(showNextArticle, 5000);
