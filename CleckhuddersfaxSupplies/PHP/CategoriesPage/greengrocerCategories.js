const btns=[
    {
        id: 1,
        name: 'Fruits'
    },
    {
        id: 2,
        name: 'Vegetables'
    },
]

const filters = [...new Set(btns.map((btn) =>
    {return btn}))]

document.getElementById('btns').innerHTML=filters.map((btn) =>{
    var{name, id} = btn;
    return(
        "<button class='fil-p' onclick='filterItems("+id+`)'>${name}</button>`
    )
}).join('');

const product = [
    {
        id :1,
        image : "../Image/apple.jpeg",
        title : "Fresh Apple",
        price : 3.50,
        category: "Fruits"
    },

    {
        id :1,
        image : "../Image/Orange.jpeg",
        title : "Fresh Orange",
        price : 3.50,
        category: "Fruits"
    },

    {
        id :1,
        image : "../Image/banana.jpeg",
        title : "Fresh Banana",
        price : 3.50,
        category: "Fruits"
    },

    {
        id :1,
        image : "../Image/Pineapple.jpeg",
        title : "Fresh Pineapple",
        price : 3.50,
        category: "Fruits"
    },

    {
        id :1,
        image : "../Image/Watermelon.jpeg",
        title : "Watermelon",
        price : 3.50,
        category: "Fruits"
    },

    {
        id :2,
        image : "../Image/Chocolatechipcookies.jpeg",
        title : "Chocolate Cookies",
        price : 3.50,
        category: "Vegetables"
    },

    {
        id :2,
        image : "../Image/Cauliflower.jpeg",
        title : "Fresh Cauliflower",
        price : 3.50,
        category: "Vegetables"
    },

    {
        id :2,
        image : "../Image/Lemon.jpeg",
        title : "Fresh Lemon",
        price : 3.50,
        category: "Vegetables"
    },

    {
        id :2,
        image : "../Image/Onion.jpeg",
        title : "Fresh Onion",
        price : 3.50,
        category: "Vegetables"
    },

    {
        id :2,
        image : "../Image/Tomato.jpeg",
        title : "Fresh Tomato",
        price : 3.50,
        category: "Vegetables"
    },
];

const categories = [...new Set(product.map((item) =>
    {return item}))]

const filterItems =(a)=>{
    const flterCategories = categories.filter(item);
    function item(value){
        if(value.id==a){
            return(
                value.id
            )
        }
    }
    displayItem(flterCategories)
}

const displayItem = (items) => {
    document.getElementById('root').innerHTML = items.map((item) =>
    {
        var {image, title, price} = item;
        return(
            `<div class="boxs">
            <h3>${title}</h3>
            <div class="img-box">
            <img class="images" src=${image}></img>
            </div>
            <div class="price">$4.99/- - 10.99/-</div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">Add to Cart</a>
            </div>`)
    }).join('');
}
displayItem(categories)