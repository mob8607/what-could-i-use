var FrameworkList = React.createClass({
    render: function() {
        var frameworkNodes = this.props.data.map(function (framework) {
            return (
                <Framework name={framework.name}>
                    {framework.text}
                </Framework>
            );
        });
        return (
            <div className="framework-list">
                {frameworkNodes}
            </div>
        );
    }
});
