package dusanrajkovic.com;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Service;
import org.springframework.web.bind.annotation.RequestParam;

@Service
public class ProductService {
	
	@Autowired
	private ProductRepository repo;
	
	public Page<Product> listAll(@RequestParam(defaultValue="0") int page)
	{
		return repo.findAll(PageRequest.of(page, 4));
	}
	
	public void save(Product product)
	{
		repo.save(product);
	}
	
	public Product get(Long id)
	{
		return repo.findById(id).get();
	}
	
	public void delete(Long id)
	{
		repo.deleteById(id);
	}
}
