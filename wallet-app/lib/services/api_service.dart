import 'package:dio/dio.dart';
import '../config/app_config.dart';
import 'secure_session_service.dart';

class ApiService {
  static final Dio dio = Dio(BaseOptions(baseUrl: AppConfig.baseUrl, headers: {'Accept': 'application/json'}))
    ..interceptors.add(InterceptorsWrapper(onRequest: (options, handler) async {
      final token = await SecureSessionService.getToken();
      if (token != null) options.headers['Authorization'] = 'Bearer $token';
      handler.next(options);
    }));
}
