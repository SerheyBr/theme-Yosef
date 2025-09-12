// ajax запрос для judgments
document.addEventListener("DOMContentLoaded", function () {
  const tagButtons = document.querySelectorAll(".judgments__tags .tags__tag");
  const postsContainer = document.querySelector(".judgments__posts");

  // Функция для загрузки постов
  function loadPosts(tagID) {
    tagButtons.forEach((btn) => {
      btn.disabled = true;
    });
    postsContainer.innerHTML =
      "<div class='loading'><img src='https://i.gifer.com/ZZ5H.gif' alt=''></div>";
    const formData = new FormData();
    formData.append("action", "my_ajax_load_posts");
    formData.append("tag_id", tagID);
    fetch(my_ajax.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        postsContainer.innerHTML = data;
      })
      .catch((error) => {
        console.error("Error:", error);
      })
      .finally(() => {
        tagButtons.forEach((btn) => {
          btn.disabled = false;
        });
      });
  }

  // Обработчик клика по кнопкам тегов
  tagButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const tagID = this.dataset.tag;
      console.log("asd");
      // Убираем активный класс у всех тегов
      tagButtons.forEach((btn) => btn.classList.remove("active"));
      // Добавляем активный класс текущему
      this.classList.add("active");

      // Загружаем посты
      loadPosts(tagID);
    });
  });
});

// ajax запрос для lectures

document.addEventListener("DOMContentLoaded", function () {
  const tagButtons = document.querySelectorAll(".lectures__tags .tags__tag");
  const postsContainer = document.querySelector(".lectures__posts");

  // Функция для загрузки постов
  function loadPosts(tagID) {
    tagButtons.forEach((btn) => {
      btn.disabled = true;
    });
    postsContainer.innerHTML =
      "<div class='loading'><img src='https://i.gifer.com/ZZ5H.gif' alt=''></div>";
    const formData = new FormData();
    formData.append("action", "my_ajax_load_posts_lectures");
    formData.append("tag_id", tagID);
    fetch(my_ajax.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        postsContainer.innerHTML = data;
      })
      .catch((error) => {
        console.error("Error:", error);
      })
      .finally(() => {
        tagButtons.forEach((btn) => {
          btn.disabled = false;
        });
      });
  }

  // Обработчик клика по кнопкам тегов
  tagButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const tagID = this.dataset.tag;
      console.log("asd");
      // Убираем активный класс у всех тегов
      tagButtons.forEach((btn) => btn.classList.remove("active"));
      // Добавляем активный класс текущему
      this.classList.add("active");

      // Загружаем посты
      loadPosts(tagID);
    });
  });
});

// ajax запрос для всплавающего меню при поиске
// document.addEventListener("DOMContentLoaded", function () {
//   const input = document.querySelector(".search");
//   const suggestions = document.querySelector(".header__search-body");
//   let timer;

//   input.addEventListener("input", function () {
//     const query = input.value.trim();

//     // если меньше 2 символов, скрываем меню
//     if (query.length < 2) {
//       suggestions.style.display = "none";
//       return;
//     }

//     // debounce, чтобы не слать запрос на каждый символ
//     clearTimeout(timer);
//     timer = setTimeout(function () {
//       const data = new FormData();
//       data.append("action", "live_search");
//       data.append("s", query);

//       fetch(my_ajax.ajax_url, {
//         method: "POST",
//         body: data,
//       })
//         .then((response) => response.json())
//         .then((results) => {
//           suggestions.innerHTML = "";

//           if (results.length > 0) {
//             results.forEach((item) => {
//               const div = document.createElement("li");
//               const a = document.createElement("a");
//               a.href = item.permalink;
//               a.textContent = item.title;
//               console.log(item);
//               div.appendChild(a);
//               suggestions.appendChild(div);
//             });
//             suggestions.style.display = "block";
//           } else {
//             suggestions.style.display = "none";
//           }
//         })
//         .catch((err) => {
//           console.error(err);
//           suggestions.style.display = "none";
//         });
//     }, 300); // 300мс задержка
//   });

//   // закрываем меню при клике вне поля
//   document.addEventListener("click", function (e) {
//     if (!input.contains(e.target) && !suggestions.contains(e.target)) {
//       suggestions.style.display = "none";
//     }
//   });
// });

document.addEventListener("DOMContentLoaded", function () {
  const input = document.querySelector(".search");
  const suggestions = document.querySelector(".header__search-body");
  let timer;

  // функция для экранирования спецсимволов RegExp
  function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
  }

  input.addEventListener("input", function () {
    const query = input.value.trim();

    // если меньше 2 символов, скрываем меню
    if (query.length < 2) {
      suggestions.style.display = "none";
      return;
    }

    // debounce, чтобы не слать запрос на каждый символ
    clearTimeout(timer);
    timer = setTimeout(function () {
      const data = new FormData();
      data.append("action", "live_search");
      data.append("s", query);

      fetch(my_ajax.ajax_url, {
        method: "POST",
        body: data,
      })
        .then((response) => response.json())
        .then((results) => {
          suggestions.innerHTML = "";

          if (results.length > 0) {
            results.forEach((item) => {
              const div = document.createElement("li");
              // const a = document.createElement("a");
              // a.href = item.permalink;

              const regex = new RegExp(`(${escapeRegExp(query)})`, "gi");
              // a.innerHTML = item.title.replace(
              //   regex,
              //   '<span class="highlight">$1</span>'
              // );

              // div.appendChild(a);
              const form = document.querySelector(".header__search"); // форма поиска
              div.innerHTML = item.title.replace(
                regex,
                '<span class="highlight">$1</span>'
              );
              suggestions.appendChild(div);

              div.addEventListener("click", function () {
                input.value = item.title; // ставим выбранное слово в поле поиска
                suggestions.style.display = "none"; // скрываем подсказки
                form.submit(); // отправляем форму на страницу поиска
              });
            });
            suggestions.style.display = "block";
          } else {
            suggestions.style.display = "none";
          }
        })
        .catch((err) => {
          console.error(err);
          suggestions.style.display = "none";
        });
    }, 100); // 300мс задержка
  });

  // закрываем меню при клике вне поля
  document.addEventListener("click", function (e) {
    if (!input.contains(e.target) && !suggestions.contains(e.target)) {
      suggestions.style.display = "none";
    }
  });
});
