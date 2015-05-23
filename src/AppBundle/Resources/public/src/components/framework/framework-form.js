var FrameworkForm = React.createClass({
    handleSubmit: function(e) {
        e.preventDefault();
        var name = React.findDOMNode(this.refs.name).value.trim();
        var description = React.findDOMNode(this.refs.description).value.trim();
        if (!name || !description) {
            return;
        }
        this.props.onFrameworkSubmit({name: name, description: description});
        React.findDOMNode(this.refs.name).value = '';
        React.findDOMNode(this.refs.description).value = '';
        return;
    },

    render: function() {

        return (
            <form className="frameworkForm" onSubmit={this.handleSubmit}>
                <input type="text" placeholder="Your name" ref="name" />
                <input type="text" placeholder="Say something..." ref="description" />
                <input type="submit" value="Post" />
            </form>
        );
    }
});
