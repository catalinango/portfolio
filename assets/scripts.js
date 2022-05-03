/* ********** Box ********** */
((d) => {
  const $mediaQuery = window.matchMedia('(max-width: 1024px)');

  if ($mediaQuery.matches) {
    const $proyects = d.querySelectorAll(".box");
    $proyects.forEach(el => {
      el.addEventListener("click", (e) => {
        el.lastElementChild.classList.toggle("box-footer-hover");
        el.firstElementChild.lastElementChild.classList.toggle("box-info-hover");
        el.firstElementChild.classList.toggle("box-img-hover");
        el.firstElementChild.firstElementChild.classList.toggle("box-img-img-hover");
      });
    });
  }
})(document);

/* ********** ContactCards ********** */
((d) => {
  const $github = d.querySelector("#github"),
    $linkedin = d.querySelector("#linkedin");

  $github.addEventListener("click", () => {
    window.open("https://github.com/catalinango", "_blank")
  });
  $linkedin.addEventListener("click", () => {
    window.open("https://www.linkedin.com/in/catalinango/", "_blank")
  });
})(document);

/* ********** ContactForm ********** */
((d) => {
  const $form = d.querySelector(".contact-form"),
    $loader = d.querySelector(".contact-form-loader"),
    $response = d.querySelector(".contact-form-response"),
    $inputs = d.querySelectorAll(".contact-form [required]");

  $inputs.forEach(input => {
    const $span = d.getElementById(input.name + '-error');
    $span.classList.add("contact-form-error", "none");
    $span.textContent = input.title;

    input.addEventListener("keyup", (e) => {
      if (e.target.matches(".contact-form [required]")) {
        let $input = e.target,
          pattern = $input.pattern || $input.dataset.pattern;

        if (pattern && $input.value !== "") {
          let regex = new RegExp(pattern);
          return !regex.exec($input.value)
            ? d.getElementById($input.name + "-error").classList.add("is-active")
            : d.getElementById($input.name + "-error").classList.remove("is-active")
        }
      }
    });
  });

  $form.addEventListener("submit", (e) => {
    e.preventDefault();

    $loader.classList.remove("none");
    fetch("./assets/send-mail.php", {
      method: "POST",
      body: new FormData(e.target)
    })
      .then((res) => res.text())
      .then((json) => {
        console.log(json);
        location.hash = "#thanks";
        $form.reset();
      })
      .catch((err) => {
        console.log(err);
        let msg = err.statusText || "An error as occured, try again later";
        $response.querySelector("h3").innerHTML = `Error ${err.status} : ${msg}`;
      })
      .finally(() => {
        $loader.classList.add("none");
        setTimeout(() => {
          location.hash = "#close"
        }, 3000);
      });
  });
})(document);


/* ********** Menu ********** */
((d) => {
  const $btnMenu = d.querySelector(".menu-btn"),
    $menu = d.querySelector(".menu");

  $btnMenu.addEventListener("click", (e) => {
    $btnMenu.firstElementChild.classList.toggle("none");
    $btnMenu.lastElementChild.classList.toggle("none");
    $menu.classList.toggle("is-active");
  });

  d.addEventListener("click", e => {
    if (!e.target.matches(".menu a")) return false;

    $btnMenu.firstElementChild.classList.remove("none");
    $btnMenu.lastElementChild.classList.add("none");
    $menu.classList.remove("is-active");
  })
})(document);
