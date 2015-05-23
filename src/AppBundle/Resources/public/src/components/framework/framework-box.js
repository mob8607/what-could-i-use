var FrameworkBox = React.createClass({
    loadFrameworksFromServer: function() {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            cache: false,
            success: function(data) {
                this.setState({data: data});
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    handleFrameworkSubmit: function(framework) {
        console.log('test');
        var frameworks = this.state.data;
        var newFrameworks = frameworks.concat([framework]);
        this.setState({data: newFrameworks});

        $.ajax({
            url: this.props.url,
            dataType: 'json',
            type: 'POST',
            data: framework,
            success: function(data) {
                this.setState({data: data});
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    getInitialState: function() {
        return {data: []};
    },
    componentDidMount: function() {
        this.loadFrameworksFromServer();
        setInterval(this.loadFrameworksFromServer, this.props.pollInterval);
    },
    render: function() {
        return (
            <div className="framework-box">
                <h1>Frameworks</h1>
                <FrameworkList data={this.state.data}/>
                <FrameworkForm onFrameworkSubmit={this.handleFrameworkSubmit} />
            </div>
        );
    }
});


