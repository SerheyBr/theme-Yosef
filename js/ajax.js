document.addEventListener("DOMContentLoaded", function () {
  const tagButtons = document.querySelectorAll(".judgments__tags .tags__tag");
  const postsContainer = document.querySelector(".judgments__posts");

  // Функция для загрузки постов
  function loadPosts(tagID) {
    tagButtons.forEach((btn) => {
      btn.disabled = true;
    });
    postsContainer.innerHTML = "<div>Загрузка постов...</div>";
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
