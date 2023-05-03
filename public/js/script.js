const API_URL = window.location.origin;

const makeFormData = (formEl) => {
    const inputs = formEl.querySelectorAll('input');
    const textareas = formEl.querySelectorAll('textarea');

    const formData = new FormData();

    for (const input of inputs) {
        formData.append(input.name, input.value)
    }

    for (const textarea of textareas) {
        formData.append(textarea.name, textarea.value)
    }

    return formData;
}

const Request = {
  get(url, config = {}) {
    return fetch(API_URL + url, {
        method: "GET",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
        },
        ...config
    })
  },
    post(url, body, config = {}) {
        return fetch(API_URL + url, {
            method: "POST",
            headers: {
                "Accept": "application/json",
            },
            body: body,
            ...config
        })
    }
};

const Notifications = {
    parent: document.getElementById('notifications'),
    _create(title, text) {

        const body = document.createElement('div');
        const titleElement = document.createElement('h4');
        const textElement = document.createElement('p');

        body.classList.add('notification');

        titleElement.textContent = title;
        textElement.textContent = text;

        body.append(titleElement);
        body.append(textElement);

        return body;

    },
    show(title, text) {
        const notification = this._create(title, text);
        this.parent.append(notification);
        setTimeout(() => {
            notification.remove()
        }, 3000)
    },
    success() {

    },
    error() {

    },
};

const createOrder = (formEl) => {
    const button = formEl.querySelector('button');
    button.addEventListener('click', (e) => {
        e.preventDefault();
        Request.post('/cart/create/order', makeFormData(formEl))
            .then((r) => r.json())
            .then((data) => {
                if(data.status) {
                    return window.location.href = data.redirect_url;
                }
                alert(data.message);
            })
        ;
    })
}

const cart = (container) => {
    const items = container.querySelectorAll('.cart-item');
    const removeCartItem = (e, item) => {
        e.preventDefault();
        const isAccepted = confirm('Вы действительно хотите удалить товар из корзины?');
        if(!isAccepted) return false;
        // Обычное
        // window.location.href = e.currentTarget.href;
        // Асинхронное
        fetch(e.currentTarget.href).then((r) => {
            if(r.ok) {
                return item.remove();
            }
            alert('Ошибка. Не удалось удалить элемент из корзины!');
        });
    }
    items.forEach((item) => {
       const removeButton = item.querySelector('a.button');
       removeButton.addEventListener('click', (e) => removeCartItem(e, item));
    });
}

const pUrl = (url) => {
    return url.replace(API_URL, '');
}

const createUser = (container) => {

    const url = container.getAttribute('action');
    const button = container.querySelector('button');

    const callback = () => {
        Request.post(pUrl(url), makeFormData(container))
            .then((r) => r.json())
            .then((data) => {
                if(data.errors) {
                    // let errors = [];
                    let values = Object.values(data.errors);
                    for (const value of values) {
                        Notifications.show('Ошибка регистрации', value.pop());
                        // errors.push(value.pop());
                    }
                    // alert(errors.join(' | '));
                }

                if(data.status) {
                    alert(`${data.message} Вы будете перенаправлены через 3 секунты!`);
                    setTimeout(() => window.location.href = data.redirect_url, 3000);
                }
            });
    }

    button.addEventListener('click', (e) => {
        e.preventDefault();
        callback();
    })

    container.addEventListener('submit', (e) => {
        e.preventDefault();
        callback();
    })

}

const init = () => {
    const checkoutFormElement = document.getElementById('js-checkout');

    if(checkoutFormElement) {
        createOrder(checkoutFormElement);
    }

    const cartElement = document.querySelector('.cart-section');

    if(cartElement) {
        cart(cartElement);
    }

    const createUserFormElement = document.getElementById('create-user-form');

    if(createUserFormElement) {
        createUser(createUserFormElement);
    }
}

document.addEventListener('DOMContentLoaded', init);
