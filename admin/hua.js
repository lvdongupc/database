const pages = document.querySelectorAll('.page');
// 当前页码
let currentPage = 0;

// 定义更新页面函数
function updatePage() {
    // 显示当前页码的页面
    pages[currentPage].classList.add('active');
    // 隐藏其他页面
    for(let i = 0; i < pages.length; i++) {
        if(i !== currentPage) {
            pages[i].classList.remove('active');
        }
    }
}
// 初始化页面
updatePage();

// 添加上一页按钮事件监听器
document.getElementById('prev').addEventListener('click', function () {
    // 防止currentPage小于0
    if(currentPage > 0) {
        currentPage--;
        updatePage();
    }
});

// 添加下一页按钮事件监听器
document.getElementById('next').addEventListener('click', function () {
    // 防止currentPage大于等于页面数
    if(currentPage < pages.length - 1) {
        currentPage++;
        updatePage();
    }
});