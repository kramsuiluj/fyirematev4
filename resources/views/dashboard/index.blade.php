<x-layout>
    <form action="{{ route('sessions.destroy') }}" method="POST">
        @csrf
        @method('DELETE')

        <button>Logout</button>
    </form>
</x-layout>
