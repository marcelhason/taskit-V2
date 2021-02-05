
    <section class="box post-list">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                </tr>
                </thead>
                @forelse( $tasks as $task )
                    <tbody>
                    <tr>
                        <td> {{ $task->id }}</td>
                    </tr>
                    </tbody>
                @empty
            </table>
        </div>
          <p>nemáte nič :(</p>

        @endforelse
    </section>

