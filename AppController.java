package dusanrajkovic.com;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

@Controller
public class AppController {

	@Autowired
	private ProductService service;
	
	@Autowired
	private ProductRepository prepo;
	
	@GetMapping("/")
	public String viewHomePage(Model model, @RequestParam(defaultValue="0") int page)
	{
		Page<Product> listProducts = service.listAll(page);
		model.addAttribute("listProducts", listProducts);
		model.addAttribute("currentPage", page);
		//model.addAttribute("data", prepo.findAll(PageRequest.of(page, 4)));
		
		
		return "index";
	}
	
	@RequestMapping("/new")
	public String showNewProductForm(Model model)
	{
		Product product = new Product();
		model.addAttribute("product", product);
		
		return "new_product";
	}
	
	@RequestMapping(value = "/save", method = RequestMethod.POST)
	public String saveProduct(@ModelAttribute("product")Product product)
	{
		service.save(product);
		
		return "redirect:/";
	}
	
	@RequestMapping("/edit/{id}")
	public ModelAndView showEditProductForm(@PathVariable(name = "id") Long id)
	{
		ModelAndView mav = new ModelAndView("edit_product");
		
		Product product = service.get(id);
		mav.addObject("product", product);
		
		return mav;
	}
	
	@RequestMapping("/delete/{id}")
	public String deleteProduct(@PathVariable(name = "id") Long id)
	{
		service.delete(id);
		
		return "redirect:/";
	}
}
