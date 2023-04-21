// navegacion del menu
const targets = document.querySelectorAll('[data-target]')
const contect = document.querySelectorAll('[data-content]')

targets.forEach(target =>{

    target.addEventListener('click', () => {

        contect.forEach(c => {
            c.classList.remove('active')
        })

        const t = document.querySelector(target.dataset.target)
        t.classList.add('active')

    })

})
//
