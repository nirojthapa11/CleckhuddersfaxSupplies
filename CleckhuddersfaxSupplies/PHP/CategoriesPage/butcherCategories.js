const btns=[
    {
        id: 1,
        name: 'Meat'
    },
    {
        id: 2,
        name: 'Wings & Legs'
    },
    {
        id: 3,
        name: 'Sausages'
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
        image : "../Image/Chickenbreasts.jpeg",
        title : "Chicken",
        price : 3.50,
        category: "Meat"
    },

    {
        id :1,
        image : "../Image/meat.jpeg",
        title : "Goat",
        price : 3.50,
        category: "Meat"
    },

    {
        id :1,
        image : "../Image/Pork.jpeg",
        title : "Pork",
        price : 3.50,
        category: "Meat"
    },

    {
        id :1,
        image : "../Image/Kangaroo.jpeg",
        title : "Kangaroo",
        price : 3.50,
        category: "Meat"
    },

    {
        id :2,
        image : "../Image/chickenlegwings.jpeg",
        title : "Chicken legs & wings",
        price : 3.50,
        category: "Wings & Legs"
    },

    {
        id :2,
        image : "../Image/GoatShoulder.jpeg",
        title : "Goat Shoulder",
        price : 3.50,
        category: "Wings & Legs"
    },

    {
        id :2,
        image : "../Image/porkleg.jpg",
        title : "Pork Leg",
        price : 3.50,
        category: "Wings & Legs"
    },

    {
        id :2,
        image : "../Image/Kangaroosolder.jpg",
        title : "Kangaroo Shoulder",
        price : 3.50,
        category: "Wings & Legs"
    },

    {
        id :3,
        image : "../Image/Sausages.jpeg",
        title : "Chicken Sausages",
        price : 3.50,
        category: "Sausages"
    },

    {
        id :3,
        image : "../Image/PorkSausage.jpeg",
        title : "Pork Sausages",
        price : 3.50,
        category: "Sausages"
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