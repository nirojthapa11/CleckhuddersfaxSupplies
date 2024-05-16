const btns=[
    {
        id: 1,
        name: 'Bread'
    },
    {
        id: 2,
        name: 'Cakes'
    },
    {
        id: 3,
        name: 'Cookies'
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
        image : "../Image/Sourdoughbread.jpeg",
        title : "Sourdough Bread",
        price : 3.50,
        category: "Bread"
    },

    {
        id :1,
        image : "../Image/Sandwichbread.jpg",
        title : "Sandwich Bread",
        price : 3.50,
        category: "Bread"
    },

    {
        id :2,
        image : "../Image/VanillaCake.jpeg",
        title : "Vanilla Cake",
        price : 3.50,
        category: "Cakes"
    },

    {
        id :2,
        image : "../Image/StrawberryCake.jpeg",
        title : "Strawberry Cake",
        price : 3.50,
        category: "Cakes"
    },

    {
        id :2,
        image : "../Image/ChocolateCake.jpeg",
        title : "Chocolate Cake",
        price : 3.50,
        category: "Cakes"
    },

    {
        id :2,
        image : "../Image/BirthdayCake.jpeg",
        title : "Birthday Cake",
        price : 3.50,
        category: "Cakes"
    },

    {
        id :3,
        image : "../Image/Chocolatechipcookies.jpeg",
        title : "Chocolate Chip",
        price : 3.50,
        category: "Cookies"
    },

    {
        id :3,
        image : "../Image/Snickerdoodle.jpeg",
        title : "Snickerdoodle",
        price : 3.50,
        category: "Cookies"
    },

    {
        id :3,
        image : "../Image/PeanutButter.jpeg",
        title : "Peanut Butter",
        price : 3.50,
        category: "Cookies"
    },

    {
        id :3,
        image : "../Image/Shortbread.jpeg",
        title : "Shortbread",
        price : 3.50,
        category: "Cookies"
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