@extends('admin.layouts.full')

@section('title', 'Администрирование')

@section('content')
    {{--<jambik-message title="First">The first text.</jambik-message>
    <jambik-message title="Second" class="is-info">Second one.</jambik-message>
    <jambik-message title="Third" class="is-success">And third.</jambik-message>
    <jambik-message title="Fourth" class="is-warning">And finally fourth.</jambik-message>--}}

    {{--<jambik-modal v-if="showModal" @close="showModal = false">
        <template slot="title">
            TITLE
        </template>
        <template slot="content">
            <div class="content">
                <h1>Hello World</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui. Fusce erat odio, sollicitudin vel erat vel, interdum mattis neque.</p>
                <h2>Second level</h2>
                <p>Curabitur accumsan turpis pharetra <strong>augue tincidunt</strong> blandit. Quisque condimentum maximus mi, sit amet commodo arcu rutrum id. Proin pretium urna vel cursus venenatis. Suspendisse potenti. Etiam mattis sem rhoncus lacus dapibus facilisis. Donec at dignissim dui. Ut et neque nisl.</p>
                <ul>
                    <li>In fermentum leo eu lectus mollis, quis dictum mi aliquet.</li>
                    <li>Morbi eu nulla lobortis, lobortis est in, fringilla felis.</li>
                    <li>Aliquam nec felis in sapien venenatis viverra fermentum nec lectus.</li>
                    <li>Ut non enim metus.</li>
                </ul>
            </div>
        </template>
    </jambik-modal>--}}

    {{--<button class="btn btn-lg btn-primary" @click="showModal = true">show modal</button>--}}

    {{--<jambik-tabs>
        <jambik-tab name="Home" :selected="true">
            <p>Here is content of tab Home</p>
        </jambik-tab>
        <jambik-tab name="About us">
            <h1>Here is content of tab About us</h1>
        </jambik-tab>
        <jambik-tab name="Contacts">
            <p>Here is content of tab Contacts</p>
        </jambik-tab>
        <jambik-tab name="Feedback">
            <p>Here is content of tab Feedback</p>
            <p>Feedback Form</p>
        </jambik-tab>
    </jambik-tabs>--}}

    {{--<jambik-coupon></jambik-coupon>--}}


@endsection

@section('head_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.2/css/bulma.css" />
@endsection

@section('footer_scripts')
    <script src="/js/vue-test.js"></script>
@endsection