let pagination = document.getElementById('page_box_btn');
let pageNumber = 1;
let totalPage = 20;

// Get the current page number from the URL
let currentPageNumber = window.location.pathname.match(/\/(\d+)(?:\.html)?$/) ;
if (currentPageNumber) {
  pageNumber = parseInt(currentPageNumber[1]);
  if (pageNumber == 1) {
    document.querySelector('.btn:first-child').classList.add('active');
  }
}

pagination.innerHTML = paginationFunction(totalPage, pageNumber);

function paginationFunction(totalPage, pageNumber) {
  let beforePage = pageNumber - 1,
    afterPage = pageNumber + 1;
  let listTag = "";
  let active;

  if (pageNumber > 1) {
    listTag += `<li class="prev btn"><button onclick="redirectToPrev()">Prev</button></li>`;
  }
  if (pageNumber > 2) {
    listTag += `<li class="btn"><button onclick="redirectToIndex()">1</button></li>`;
    if (pageNumber > 3) {
      listTag += `<li class="dots"><span>...</span></li>`;
    }
  }
  if (pageNumber == totalPage) {
    beforePage = beforePage - 2;
  } else if (pageNumber == totalPage - 1) {
    beforePage = beforePage - 1;
  }
  if (pageNumber == 1) {
    afterPage = afterPage + 2;
  } else if (pageNumber == 2) {
    afterPage = afterPage + 1;
  }
  for (let index = beforePage; index <= afterPage; index++) {
    if (totalPage < index) {
      break;
    }
    if (index == 0) {
      index = index + 1;
    }
    if (pageNumber == index) {
      active = "active";
    } else {
      active = "";
    }
    if (index == 1) {
      listTag += `<li class="btn ${active}"><button onclick="redirectToIndex()">${index}</button></li>`;
    } else {
      if (pageNumber > 1) {
        listTag += `<li class="btn ${active}"><button onclick="window.location.href='./${index}'">${index}</button></li>`;
      } else {
        listTag += `<li class="btn ${active}"><button onclick="window.location.href='./pages/${index}'">${index}</button></li>`;
      }
    }
  }
  if (pageNumber < totalPage - 1) {
    if (pageNumber < totalPage - 2) {
      listTag += `<li class="dots"><span>...</span></li>`;
    }
    if (pageNumber > 1) {
      listTag += `<li class="next btn"><button onclick="redirectToNext()">Next</button></li>`;
    } else {
      listTag += `<li class="next btn"><button onclick="redirectToNext()">Next</button></li>`;
    }
  }
  pagination.innerHTML = listTag;
  return listTag;
}

function redirectToIndex() {
  if (window.location.pathname.includes('/pages/')) {
    window.location.href = window.location.origin + '/index.html';
  } else {
    window.location.href = './index.html';
  }
}

function redirectToPrev() {
  if (pageNumber > 2) {
    window.location.href = './' + (pageNumber - 1) + '.html';
  } else {
    if (window.location.pathname.includes('/pages/')) {
   window.location.href = window.location.origin + '/index.html';
    } else {
      window.location.href = './index.html';
    }
  }
}
function redirectToNext() {
 
  if (pageNumber < totalPage) {
    if (window.location.pathname.includes('/pages/')) {
   window.location.href = './' + (pageNumber + 1) + '.html';
    } else {
      window.location.href = './pages/' + (pageNumber + 1) + '.html';
    }
  }
}
