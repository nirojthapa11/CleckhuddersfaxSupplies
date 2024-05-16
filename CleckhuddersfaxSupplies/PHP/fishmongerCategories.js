const btns=[
    {
        id: 1,
        name: 'Fish'
    },
    {
        id: 2,
        name: 'Seafood'
    },
    {
        id: 3,
        name: 'Smoked & Cured Fish'
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
        image : "../Image/Perch.jpeg",
        title : "Perch",
        price : 3.50,
        category: "Fish"
    },

    {
        id :1,
        image : "../Image/RainbowTrout.jpeg",
        title : "Rainbow Trout",
        price : 3.50,
        category: "Fish"
    },

    {
        id :1,
        image : "../Image/Sardines.jpeg",
        title : "Sardines",
        price : 3.50,
        category: "Fish"
    },

    {
        id :1,
        image : "../Image/Stripedbass.jpeg",
        title : "Stripedbass",
        price : 3.50,
        category: "Fish"
    },

    {
        id :2,
        image : "../Image/Crab.jpeg",
        title : "Crab",
        price : 3.50,
        category: "Seafood"
    },

    {
        id :2,
        image : "../Image/Lobster.jpeg",
        title : "Lobster",
        price : 3.50,
        category: "Seafood"
    },

    {
        id :2,
        image : "../Image/Shrimp.jpeg",
        title : "Shrimp",
        price : 3.50,
        category: "Seafood"
    },

    {
        id :2,
        image : "../Image/Mussels.jpeg",
        title : "Mussels",
        price : 3.50,
        category: "Seafood"
    },

    {
        id :3,
        image : "../Image/Smokedsalmon.jpeg",
        title : "Smoked Salmon",
        price : 3.50,
        category: "Smoked & Cured Fish"
    },

    {
        id :3,
        image : "../Image/lox.jpeg",
        title : "Lox",
        price : 3.50,
        category: "Smoked & Cured Fish"
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