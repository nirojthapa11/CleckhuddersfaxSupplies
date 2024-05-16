const btns=[
    {
        id: 1,
        name: 'Cured Meats'
    },
    {
        id: 2,
        name: 'Cheeses'
    },
    {
        id: 3,
        name: 'Sandwiches'
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
        image : "../Image/Bresaola.jpeg",
        title : "Bresaola",
        price : 3.50,
        category: "Cured Meats"
    },

    {
        id :1,
        image : "../Image/Coppa.jpeg",
        title : "Coppa",
        price : 3.50,
        category: "Cured Meats"
    },

    {
        id :1,
        image : "../Image/Genoa.jpeg",
        title : "Genoa",
        price : 3.50,
        category: "Cured Meats"
    },

    {
        id :1,
        image : "../Image/Guanciale.jpeg",
        title : "Guanciale",
        price : 3.50,
        category: "Cured Meats"
    },

    {
        id :2,
        image : "../Image/GreekFeta.jpeg",
        title : "Greek Feta",
        price : 3.50,
        category: "Cheeses"
    },

    {
        id :2,
        image : "../Image/Goudacheese.jpeg",
        title : "Gouda Cheese",
        price : 3.50,
        category: "Cheeses"
    },

    {
        id :3,
        image : "../Image/ChickenSandwich.jpeg",
        title : "Chicken Sandwich",
        price : 3.50,
        category: "Sandwiches"
    },

    {
        id :3,
        image : "../Image/EggSandwich.jpeg",
        title : "Egg Sandwich",
        price : 3.50,
        category: "Sandwiches"
    },

    {
        id :3,
        image : "../Image/SeafoodSandwich.jpeg",
        title : "Seafood Sandwich",
        price : 3.50,
        category: "Sandwiches"
    },

    {
        id :3,
        image : "../Image/HamSandwich.jpeg",
        title : "Ham Sandwich",
        price : 3.50,
        category: "Sandwiches"
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