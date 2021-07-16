import handleAdd from './handle_add.js';

document.addEventListener('submit', e => {
    e.preventDefault();
    if(e.target.matches('#formRegister')){
        handleAdd(e);
    }
});


