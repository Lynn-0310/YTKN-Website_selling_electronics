<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, bạn có thể xác nhận địa chỉ email của mình bằng cách nhấp vào liên kết chúng tôi vừa gửi qua email? Nếu bạn không nhận được email, chúng tôi sẵn sàng gửi lại cho bạn.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Một liên kết xác nhận mới đã được gửi đến địa chỉ email bạn đã cung cấp trong quá trình đăng ký.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Gửi lại Email Xác Nhận') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Đăng Xuất') }}
            </button>
        </form>
    </div>
</x-guest-layout>
