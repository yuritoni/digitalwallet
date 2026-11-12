import 'package:flutter/material.dart';
import '../services/api_service.dart';
import '../services/secure_session_service.dart';
import 'home_screen.dart';

class LoginScreen extends StatefulWidget { const LoginScreen({super.key}); @override State<LoginScreen> createState()=>_LoginScreenState(); }
class _LoginScreenState extends State<LoginScreen>{
 final email=TextEditingController(); final password=TextEditingController(); bool loading=false;
 Future<void> login() async { setState(()=>loading=true); try{ final res=await ApiService.dio.post('/login', data:{'email':email.text,'password':password.text}); await SecureSessionService.saveToken(res.data['token']); if(mounted) Navigator.pushReplacement(context, MaterialPageRoute(builder:(_)=>const HomeScreen())); }catch(e){ if(mounted) ScaffoldMessenger.of(context).showSnackBar(SnackBar(content:Text('Login gagal: $e'))); } finally{ if(mounted)setState(()=>loading=false);} }
 @override Widget build(BuildContext context){return Scaffold(body:Container(decoration:const BoxDecoration(gradient:LinearGradient(colors:[Color(0xff0f172a),Color(0xff4f46e5)],begin:Alignment.topLeft,end:Alignment.bottomRight)),child:Center(child:SingleChildScrollView(padding:const EdgeInsets.all(24),child:Card(elevation:20,shape:RoundedRectangleBorder(borderRadius:BorderRadius.circular(32)),child:Padding(padding:const EdgeInsets.all(24),child:Column(mainAxisSize:MainAxisSize.min,children:[const Text('💳',style:TextStyle(fontSize:56)),const SizedBox(height:12),const Text('Digital Wallet',style:TextStyle(fontSize:28,fontWeight:FontWeight.w900)),const SizedBox(height:24),TextField(controller:email,decoration:const InputDecoration(labelText:'Email',border:OutlineInputBorder())),const SizedBox(height:12),TextField(controller:password,obscureText:true,decoration:const InputDecoration(labelText:'Password',border:OutlineInputBorder())),const SizedBox(height:20),FilledButton(onPressed:loading?null:login,style:FilledButton.styleFrom(minimumSize:const Size.fromHeight(52)),child:Text(loading?'Loading...':'Login'))]))))));}
}
