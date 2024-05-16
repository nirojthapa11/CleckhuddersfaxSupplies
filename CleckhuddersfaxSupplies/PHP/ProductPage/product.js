// let iconCart = document.querySelector('.icon-cart');
// let closeCart = document.querySelector('.close');
let body = document.querySelector('body');
let listProductHTML = document.querySelector('.listProduct');
// let listCartHTML = document.querySelector('.listCart');
// let iconCartSpan = document.querySelector('.icon-cart span');

let listProduct = [];
// let carts = [];

// iconCart.addEventListener('click', () => {
//     body.classList.toggle('showCart')
// })

// closeCart.addEventListener('click', () => {
//     body.classList.toggle('showCart')
// })

const addDataToHTML = () => {
    listProductHTML.innerHTML = '';
    if(listProduct.length > 0){
        listProduct.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.dataset.id = product.id;
            newProduct.classList.add('item');
            newProduct.innerHTML = `
                <img src="${product.image}" alt="">
                <h3>${product.name}</h3>
                <div class="price">$${product.price}</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="#" class="addCart">Add to Cart</a>
            `;
            listProductHTML.appendChild(newProduct);
        })
    }
}

// listProductHTML.addEventListener('click', (event) => {
//     let positionClick = event.target;
//     if(positionClick.classList.contains('addCart')){
//         let product_id = positionClick.parentElement.dataset.id;
//         addToCart(product_id);
//     }
// })

// const addToCart = (product_id) => {
//     let positionThisProductINCart = carts.findIndex((value) => value.product_id == product_id);
//     if(carts.length <= 0){
//         carts = [{
//             product_id: product_id,
//             quantity: 1
//         }]
//     }else if(positionThisProductINCart < 0){
//         carts.push({
//             product_id: product_id,
//             quantity: 1
//         });
//     }else{
//         carts[positionThisProductINCart].quantity = carts[positionThisProductINCart].quantity + 1;
//     }
//     addCartToHTML();
//     addCartToMemory();
// }

// const addCartToMemory = () => {
//     localStorage.setItem('cart', JSON.stringify(carts));
// }

// const addCartToHTML = () => {
//     listCartHTML.innerHTML = '';
//     let totalQuantity = 0;
//     if(carts.length > 0){
//         carts.forEach(cart =>{
//             totalQuantity = totalQuantity + cart.quantity;
//             let newCart = document.createElement('div');
//             newCart.classList.add('item');
//             newCart.dataset.id = cart.product_id;
//             let positionProduct = listProduct.findIndex((value) => value.id == cart.product_id);
//             let info = listProduct[positionProduct];
//             newCart.innerHTML = `
//                 <div class="image">
//                     <img src="${info.image}" alt="">
//                 </div>
//                 <div class="name">
//                 ${info.name}
//                 </div>
//                 <div class="totalPrice">
//                 $${info.price * cart.quantity}
//                 </div>
//                 <div class="quantity">
//                     <span class="minus"><</span>
//                     <span>${cart.quantity}</span>
//                     <span class="plus">></span>
//                 </div>
//             `;
//             listCartHTML.appendChild(newCart);
//         })
//     }
//     iconCartSpan.innerHTML = totalQuantity;
// }

// listCartHTML.addEventListener('click' , (event) => {
//     let positionClick = event.target;
//     if(positionClick.classList.contains('minus') || positionClick.classList.contains('plus')){
//         let product_id = positionClick.parentElement.parentElement.dataset.id;
//         let type = 'minus';
//         if(positionClick.classList.contains('plus')){
//             type ='plus';
//         }
//         changeQuantity(product_id, type);
//     }
// })

// const changeQuantity = (product_id, type) => {
//     let positionItemInCart = carts.findIndex((value) => value.product_id == product_id);
//     if(positionItemInCart >= 0){
//         switch(type){
//             case 'plus':
//                 carts[positionItemInCart].quantity = carts[positionItemInCart].quantity + 1;
//                 break;

//             default:
//                 let valueChange = carts[positionItemInCart].quantity -1;
//                 if(valueChange > 0){
//                     carts[positionItemInCart].quantity = valueChange;
//                 }else{
//                     carts.splice(positionItemInCart, 1);
//                 }
//                 break;
//         }
//     }
//     addCartToMemory();
//     addCartToHTML();
// }

const initApp = () => {
    fetch('product.json')
    .then(response => response.json())
    .then(data => {
        listProduct = data;
        addDataToHTML();

        // if(localStorage.getItem('cart')){
        //     carts = JSON.parse(localStorage.getItem('cart'));
        //     addCartToHTML();
        // }
    })
}
initApp();

