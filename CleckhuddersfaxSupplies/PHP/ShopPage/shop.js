const btns=[
    {
        id: 1,
        name: 'Greengrocer'
    },
    {
        id: 2,
        name: 'Bakery'
    },
    {
        id: 3,
        name: 'Butcher'
    },
    {
        id: 4,
        name: 'Fishmonger'
    },
    {
        id: 5,
        name: 'Delicatessen'
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
        category: "Greengrocer"
    },

    {
        id :1,
        image : "../Image/Orange.jpeg",
        title : "Fresh Orange",
        price : 3.50,
        category: "Greengrocer"
    },

    {
        id :1,
        image : "../Image/banana.jpeg",
        title : "Fresh Banana",
        price : 3.50,
        category: "Greengrocer"
    },

    {
        id :2,
        image : "../Image/Baguettes.jpeg",
        title : "Fresh Baguettes",
        price : 3.50,
        category: "Delicatessen"
    },

    {
        id :2,
        image : "../Image/Croissants.jpeg",
        title : "Croissants",
        price : 3.50,
        category: "Delicatessen"
    },

    {
        id :2,
        image : "../Image/Chocolatechipcookies.jpeg",
        title : "Chocolate Cookies",
        price : 3.50,
        category: "Bakery"
    },

    {
        id :3,
        image : "../Image/Sausages.jpeg",
        title : "Chicken Sausages",
        price : 3.50,
        category: "Butcher"
    },

    {
        id :3,
        image : "../Image/meat.jpeg",
        title : "Goat Meat",
        price : 3.50,
        category: "Butcher"
    },

    {
        id :4,
        image : "../Image/Vealcutlets.jpeg",
        title : "Veal Cutlets",
        price : 3.50,
        category: "Fishmonger"
    },

    {
        id :4,
        image : "../Image/Oysters.jpeg",
        title : "Oysters",
        price : 3.50,
        category: "Fishmonger"
    },

    {
        id :5,
        image : "../Image/Sourdoughbread.jpeg",
        title : "Sourdough Bread",
        price : 3.50,
        category: "Bakery"
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