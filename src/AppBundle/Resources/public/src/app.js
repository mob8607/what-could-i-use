var data = [
    {name: "Symfony2", text: "This is one framework"},
    {author: "Yii2", text: "This is *another* framework"}
];

React.render(
    <FrameworkBox url="/data" pollInterval={20000}/>,
    document.getElementById('content')
);
