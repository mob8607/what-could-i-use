var Framework = React.createClass({
    render: function() {
        return (
            <div className="framework">
                <h2 className="framework-name">
                    {this.props.name}
                </h2>
                {this.props.children}
            </div>
        );
    }
});
