if ( document.getElementById('button_soup') && document.getElementById('button_meat') && document
.getElementById('button_desserts') ) {
  document.getElementById('button_soup').addEventListener('click', sortRecipes)
  document.getElementById('button_meat').addEventListener('click', sortRecipes)
  document
    .getElementById('button_desserts')
    .addEventListener('click', sortRecipes)

}

function sortRecipes(e) {
  if (e.target.id == 'button_soup') {
    if (e.target.classList.contains('recipes__button--soup--selected')) {
      changeButtonStyles(false, e.target, 'recipes__button--soup')
    } else {
      changeButtonStyles(true, e.target, 'recipes__button--soup')
    }
    filteringRecipes()
  } else if (e.target.id == 'button_meat') {
    if (e.target.classList.contains('recipes__button--meat--selected')) {
      changeButtonStyles(false, e.target, 'recipes__button--meat')
    } else {
      changeButtonStyles(true, e.target, 'recipes__button--meat')
    }
    filteringRecipes()
  } else if (e.target.id == 'button_desserts') {
    if (e.target.classList.contains('recipes__button--desserts--selected')) {
      changeButtonStyles(false, e.target, 'recipes__button--desserts')
    } else {
      changeButtonStyles(true, e.target, 'recipes__button--desserts')
    }
    filteringRecipes()
  }
}

function changeButtonStyles(add_selected = true, element, class_name) {
  if (add_selected) {
    element.classList.remove(class_name)
    element.classList.add(class_name + '--selected')
  } else {
    element.classList.remove(class_name + '--selected')
    element.classList.add(class_name)
  }
}

function filteringRecipes() {
  const soups_selected = document
    .getElementById('button_soup')
    .classList.contains('recipes__button--soup--selected')
  const meats_selected = document
    .getElementById('button_meat')
    .classList.contains('recipes__button--meat--selected')
  const desserts_selected = document
    .getElementById('button_desserts')
    .classList.contains('recipes__button--desserts--selected')

  if (soups_selected || meats_selected || desserts_selected) {
    const list_of_soups = document.getElementsByClassName('recipes__card--soup')
    const list_of_meats = document.getElementsByClassName('recipes__card--meat')
    const list_of_desserts = document.getElementsByClassName(
      'recipes__card--desserts',
    )

    function addRemoveClass(array, add = true) {
      if (add) {
        for (let i = 0; i < array.length; i++) {
          array[i].classList.add('recipes__card--hidden')
        }
      } else {
        for (let i = 0; i < array.length; i++) {
          array[i].classList.remove('recipes__card--hidden')
        }
      }
    }

    soups_selected
      ? addRemoveClass(list_of_soups, false)
      : addRemoveClass(list_of_soups)
    meats_selected
      ? addRemoveClass(list_of_meats, false)
      : addRemoveClass(list_of_meats)
    desserts_selected
      ? addRemoveClass(list_of_desserts, false)
      : addRemoveClass(list_of_desserts)
  } else {
    const list_of_recipes = document.getElementsByClassName('recipes__card')

    for (let i = 0; i < list_of_recipes.length; i++) {
      list_of_recipes[i].classList.remove('recipes__card--hidden')
    }
  }
}

if ( document.querySelector('.recipes__grid') ) {
  const grid = document.querySelector('.recipes__grid')
  animateCSSGrid.wrapGrid(grid, { duration: 600, easing: 'backOut' })
}

AOS.init({ once: true })